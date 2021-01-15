import { Component, OnInit } from '@angular/core';
import { HttpService } from '../../../services/http.service';
@Component({
  selector: 'app-page3',
  templateUrl: './page3.page.html',
  styleUrls: ['./page3.page.scss'],
})
export class Page3Page implements OnInit {

  offers: any;

  constructor(private http: HttpService) {
    this.loadOffers();
  }

  ngOnInit() {
  }
  
  loadOffers() {
    this.http.loadOffers().then(
      (res: any) => {
        if (res.success) {
          this.offers = res.data;
          this.http.setOffers(res.data);
          console.log(this.offers);
        }
      },
      (error) => {
        console.error(error);
      }
    );
  }
  deleteOffer(id:number) {
    console.log("Has borrado la noticia con id: " + id);
    this.loadOffers();
  }
}
