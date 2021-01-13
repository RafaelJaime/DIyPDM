import { analyzeAndValidateNgModules } from '@angular/compiler';
import { Component } from '@angular/core';
import { HttpService } from '../../services/http.service';


@Component({
  selector: 'app-tab2',
  templateUrl: 'tab2.page.html',
  styleUrls: ['tab2.page.scss']
})
export class Tab2Page {

  offers: any[];

  size: any;

  constructor(private http: HttpService) {
    this.loadOffers();
  }

  loadOffers() {
    this.http.loadOffers().then(
      (res: any) => {
        if (res.success) {
          this.offers = res.data
          this.size=this.offers.length;
          console.log(this.offers);
        }
      },
      (error) => {
        console.error(error);
      }
    );
  }

  Applied(){
    this.http.OffersApply().then(
      (res: any) => {
          console.log(res);
      },
      (error) => {
        console.error(error);
      }
    );
  }

}
