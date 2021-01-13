import { Component } from '@angular/core';
import { HttpService } from '../../services/http.service';


@Component({
  selector: 'app-tab2',
  templateUrl: 'tab2.page.html',
  styleUrls: ['tab2.page.scss']
})
export class Tab2Page {

  offers: any[];

  constructor(private http: HttpService) {
    http.LoginUser('a@a.com', 'a');
  }

  loadOffers() {
    this.http.loadOffers().then(
      (res: any) => {
        if (res.success) {
          console.log(this.offers);
          this.offers = res.data
        }
      },
      (error) => {
        console.error(error);
      }
    );
  }

}
