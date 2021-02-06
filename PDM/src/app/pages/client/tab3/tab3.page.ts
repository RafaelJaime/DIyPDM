import { Component } from "@angular/core";
import { HttpService } from "src/app/services/http.service";
@Component({
  selector: "app-tab3",
  templateUrl: "tab3.page.html",
  styleUrls: ["tab3.page.scss"],
})
export class Tab3Page {
  offers: any;

  constructor(private http: HttpService) {
    this.loadOffersApplied();
  }

  loadOffersApplied() {
    this.http.loadOffersApplied().then(
      (res: any) => {
        if (res.success) {
          this.offers = res.data;
          console.log(this.offers.length);
        }
      },
      (error) => {
        console.error(error);
      }
    );
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
