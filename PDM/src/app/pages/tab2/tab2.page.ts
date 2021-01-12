import { Component } from '@angular/core';
import { HttpService } from '../../services/http.service';


@Component({
  selector: 'app-tab2',
  templateUrl: 'tab2.page.html',
  styleUrls: ['tab2.page.scss']
})
export class Tab2Page {

  offers: any;
  token: any;

  constructor(private http: HttpService) {
      // this.hacerLogin();
  }

  // hacerLogin() {
  //   this.http.login()
  //   .then(data => {
  //   this.token = data;
  //   });
  // }

  // obtenerProducts() {
  //   this.http.getProducts(this.token)
  //   .then(data => {
  //   this.offers = data;
  //   });
  // }

  // loadOffers(){
  // this.http.loadOffers().then(
  //   (res: any) => {
  //     this.offers = res.results;
  //   },
  //   (error) =>{
  //     console.error(error);
  //   }
  // );
  // }

}
