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

  fecha: any;
  meses: any[];
  NumOfertas: any[];
  constructor(private http: HttpService) {
    this.NumOfertas = [0, 0, 0, 0, 0, 0];
    this.meses = [0, 0, 0, 0, 0, 0];
    this.fecha = new Date().toISOString();
    this.meses = [];
    for (let i = 0; i < 6; i++) {
      let numero = parseInt(this.fecha.substring(5, 7)) - i;
      if (numero <= 0) {
        numero += 12;
      }
      this.meses.push(numero.toString());
    }
    this.loadCicles();
  }
  loadCicles() {
    this.http.getCicles().then(
      (res: any) => {
        if (res.success) {
          this.cicles = res.data;
        }
      },
      (error) => {
        console.error(error);
      }
    );
  }

  OnChange(event) {
    this.cicle = event.detail.value;
    this.loadOffers();
    console.log(this.fecha.substring(5, 7));
    console.log(this.fecha.substring(0, 4));
    setTimeout(() => {
      // Esto para ordenarlos y coger sus 6 anteriores
      console.log(this.offers);
      this.NumOfertas = [0, 0, 0, 0, 0, 0];
      let Mes = parseInt(this.fecha.substring(5, 7));
      let Ano = parseInt(this.fecha.substring(0, 4));
      for (let i = 0; i < this.offers.length; i++) {
        const element = this.offers[i];
        let MesActual = parseInt(element.date_max.substring(5, 7));
        let AnoActual = parseInt(element.date_max.substring(0, 4));
        for (let i = 0; i < this.NumOfertas.length; i++) {
          let otroMes = Mes - i;
          let otroAno = Ano;
          if (otroMes <= 0 ) {
            otroMes +=12;
            otroAno-=1;
          }
          console.log(otroMes + "/" + Ano);
          if ( otroMes === MesActual && otroAno === AnoActual) {
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
