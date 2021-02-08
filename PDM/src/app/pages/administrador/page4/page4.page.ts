import { Component, OnInit } from "@angular/core";
import { ChartDataSets } from "chart.js";
import { Color, Label } from "ng2-charts";

import { HttpClient } from "@angular/common/http";

import { Chart } from "chart.js";
import { AfterViewInit, ElementRef, ViewChild } from "@angular/core";
import { HttpService } from "src/app/services/http.service";
import { callbackify } from "util";

@Component({
  selector: "app-page4",
  templateUrl: "./page4.page.html",
  styleUrls: ["./page4.page.scss"],
})
export class Page4Page implements OnInit {
  @ViewChild("lineCanvas") private lineCanvas: ElementRef;

  lineChart: any;

  cicles: any[];
  cicle: any;
  offers: any[];

  meses: any;
  NumOfertas: any[];
  constructor(private http: HttpService) {
    this.NumOfertas = [0, 0, 0, 0, 0, 0];
    meses: [0, 0, 0, 0, 0, 0];
    this.loadCicles();
  }
  loadCicles() {
    this.http.getCicles().then(
      (res: any) => {
        if (res.success) {
          this.cicles = res.data;
          console.log(this.cicles);
        }
      },
      (error) => {
        console.error(error);
      }
    );
  }

  OnChange(event) {
    this.cicle = event.detail.value;
    console.log(this.cicle);
    this.loadOffers();
    console.log(this.offers);
    // Todo esto para los mesesthis.NumOfertas = [0, 0, 0, 0, 0, 0];
    this.meses = [];
    setTimeout(() => {
      for (let i = 0; i < this.offers.length; i++) {
        const element = this.offers[i];
        console.log(element);
        this.meses.push(element.date_max);
      }
      // Esto para ordenarlos y coger sus 6 anteriores
      this.meses.sort();
      let fecha = this.meses[this.meses.length - 1];
      this.meses = [];
      for (let i = 0; i < 6; i++) {
        let numero = parseInt(fecha.substring(5, 7)) - i;
        if (numero <= 0) {
          numero += 12;
        }
        this.meses.push(numero.toString());
      }

      this.NumOfertas = [0, 0, 0, 0, 0, 0];
      let Mes = parseInt(fecha.substring(5, 7));
      let Ano = parseInt(fecha.substring(0, 4));
      for (let i = 0; i < this.offers.length; i++) {
        const element = this.offers[i];
        let MesActual = parseInt(element.date_max.substring(5, 7));
        let AnoActual = parseInt(element.date_max.substring(0, 4));
        for (let i = 0; i < this.NumOfertas.length; i++) {
          if (Mes - i == MesActual && Ano == AnoActual) {
            this.NumOfertas[i] += 1;
          }
        }
      }
      console.log(this.NumOfertas);

      this.lineChartMethod();
    }, 1000);
  }

  ngOnInit() {}
  ngAfterViewInit() {
    this.lineChartMethod();
  }
  lineChartMethod() {
    this.lineChart = new Chart(this.lineCanvas.nativeElement, {
      type: "line",
      data: {
        labels: this.meses,
        datasets: [
          {
            label: "Offer per month",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: "butt",
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: "miter",
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: this.NumOfertas,
            spanGaps: false,
          },
        ],
      },
    });
  }
  loadOffers() {
    this.http.loadOffersNotApplied().then(
      (res: any) => {
        if (res.success) {
          this.offers = [];
          for (let i = 0; i < res.data.length; i++) {
            const element = res.data[i];
            if (this.cicle == element.cicle_id) {
              this.offers.push(element);
            }
          }
        }
        return true;
      },
      (error) => {
        console.error(error);
        return false;
      }
    );
  }
}
