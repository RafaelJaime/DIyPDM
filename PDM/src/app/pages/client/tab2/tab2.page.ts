import { Identifiers } from '@angular/compiler';
import { Component } from '@angular/core';
import { ModalController } from '@ionic/angular';
import { HttpService } from 'src/app/services/http.service';
import { Tab2ModalPage } from '../tab2-modal/tab2-modal.page';


@Component({
  selector: 'app-tab2',
  templateUrl: 'tab2.page.html',
  styleUrls: ['tab2.page.scss']
})
export class Tab2Page {

  filter:any;

  empty:any;

  loadedOffers: any[];
  offers: any[];

  offersViewed: any[];

  size: any;

  constructor(private http: HttpService,public ModalController: ModalController) {
   this.loadOffers();
  }

  onChange(value){
    this.filter=value.detail.value;
    this.loadOffersById(this.filter);
  }

  loadOffers() {
    this.http.loadOffers().then(
      (res: any) => {
        if (res.success) {
          this.loadedOffers = res.data;
          this.offers = res.data;
          this.http.setOffers(res.data);
          this.size=this.offers.length;
          console.log(this.offers);
        }
      },
      (error) => {
        console.error(error);
      }
    );
  }

  loadOffersById(id:number) {
    this.http.loadOffers().then(
      (res: any) => {
        if (res.success) {
          this.offers = [];
          for (let i = 0; i < res.data.length; i++) {
            if(res.data[i].cicle_id == id){
              this.offers += res.data[i];
              console.log(this.offers);
            }
            
          }
            this.http.setOffers(res.data);
            this.size=this.offers.length;
            console.log(this.offers);
        }
      },
      (error) => {
        console.error(error);
      }
    );
  }

  ApplyOffer(id:number){
    this.http.ApplyOffer(id)
      .then(data => {
        console.log(data);
        }
      );
  }

  async ViewMore(id:number){
    const modal = await this.ModalController.create({
      component: Tab2ModalPage,
      cssClass: 'tab2-modal'
    });

    this.http.setId(id);

    console.log(id)
    return await modal.present();
  }

}