import { Identifiers } from "@angular/compiler";
import { Component } from "@angular/core";
import { ModalController } from "@ionic/angular";
import { HttpService } from "src/app/services/http.service";
import { Tab2ModalPage } from "../tab2-modal/tab2-modal.page";

@Component({
  selector: "app-tab2",
  templateUrl: "tab2.page.html",
  styleUrls: ["tab2.page.scss"],
})
export class Tab2Page {
  empty: any;

  offers: any[];

  offersViewed: any[];

  size: any;

  seleccion: any;

  cicles: any[];
  cicle: any;
  constructor(
    private http: HttpService,
    public ModalController: ModalController
  ) {
    this.cicle = -1;
    this.loadOffers();
    this.loadCicles();
  }

  Search(event) {
    this.cicle = event.detail.value;
  }
  loadOffers() {
    this.http.loadOffersNotApplied().then(
      (res: any) => {
        if (res.success) {
          if (this.cicle == -1) {
            this.offers = [];
            for (let i = 0; i < res.data.length; i++) {
              const element = res.data[i];
              if (!element.deleted) {
                this.offers.push(element);
              }
            }
            this.http.setOffers(res.data);
            this.size = this.offers.length;
            console.log(this.offers);
          } else {
            this.size = 0;
            this.offers = [];
            for (let i = 0; i < res.data.length; i++) {
              const element = res.data[i];
              if (this.cicle == element.cicle_id) {
                this.offers.push(element);
                this.size += 1;
              }
            }

            console.log(this.offers);
          }
        }
      },
      (error) => {
        console.error(error);
      }
    );
  }
  ApplyOffer(id: number) {
    this.http.ApplyOffer(id).then((data) => {
      console.log(data);
    });
    this.loadOffers();
  }

  async ViewMore(id: number) {
    const modal = await this.ModalController.create({
      component: Tab2ModalPage,
      cssClass: "tab2-modal",
    });

    this.http.setId(id);

    console.log(id);
    return await modal.present();
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
    this.loadOffers();
  }
}
