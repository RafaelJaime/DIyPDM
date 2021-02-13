import { Component, OnInit } from "@angular/core";
import { HttpService } from "../../../services/http.service";
import { AlertController } from "@ionic/angular";
@Component({
  selector: "app-page3",
  templateUrl: "./page3.page.html",
  styleUrls: ["./page3.page.scss"],
})
export class Page3Page implements OnInit {
  offers: any;

  selectOptions: any;
  constructor(
    private http: HttpService,
    public alertController: AlertController
  ) {
    this.loadOffers();
  }

  ngOnInit() {}

  loadOffers() {
    this.http.loadOffers().then(
      (res: any) => {
        if (res.success) {
          this.offers = [];
          for (let i = 0; i < res.data.length; i++) {
            const element = res.data[i];
            if (element.deleted == 0) {
              this.offers.push(element);
            }
          }
          this.http.setOffers(res.data);
          console.log(this.offers);
        }
      },
      (error) => {
        console.error(error);
      }
    );
  }
  deleteOffer(id: number) {
    this.alertController
      .create({
        header: "Delete",
        subHeader: "Are you sure?",
        message: "You are going to delet an offer.",
        buttons: [
          {
            text: "No",
          },
          {
            text: "Yes",
            handler: () => {
              this.http.deleteOffer(id);
              this.loadOffers();
            },
          },
        ],
      })
      .then((res) => {
        res.present();
      });
  }
}
