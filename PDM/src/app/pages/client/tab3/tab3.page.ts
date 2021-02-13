import { Component } from "@angular/core";
import { HttpService } from "src/app/services/http.service";
import { ModalController } from "@ionic/angular";
import { Tab2ModalPage } from "../tab2-modal/tab2-modal.page";
@Component({
  selector: "app-tab3",
  templateUrl: "tab3.page.html",
  styleUrls: ["tab3.page.scss"],
})
export class Tab3Page {
  offers: any;

  constructor(private http: HttpService,
    public ModalController: ModalController) {
    this.loadOffersApplied();
  }

  loadOffersApplied() {
    this.http.loadOffersApplied().then(
      (res: any) => {
        this.offers = [];
        for (let i = 0; i < res.data.length; i++) {
          const element = res.data[i];
          if (!element.deleted) {
            this.offers.push(element);
          }
        }
      },
        (error) => {
          console.error(error);
        }
    );
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
  unapply(id: number) {
    this.http.unpplied(id).then((data) => {
      console.log(data);
    });
    this.loadOffersApplied();
  }
  onPush() {
    this.loadOffersApplied();
  }
}
