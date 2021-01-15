import { Component, OnInit } from '@angular/core';
import { ModalController } from '@ionic/angular';
import { HttpService } from 'src/app/services/http.service';
import { Tab2PageRoutingModule } from '../tab2/tab2-routing.module';
import { Tab2Page } from '../tab2/tab2.page';

@Component({
  selector: 'app-tab2-modal',
  templateUrl: './tab2-modal.page.html',
  styleUrls: ['./tab2-modal.page.scss'],
})
export class Tab2ModalPage implements OnInit {

  offers: any[];

  id: any;

  size: any;

  constructor(public modalController: ModalController,private http: HttpService) { 
    this.loadOffers();
  }

  ngOnInit() {
  }

  viewMore(){

  }

  getId(id:number){
    if(this.id==id){
      return true;
    }else{
      return false;
    }
  }

  loadOffers() {
    this.offers=this.http.getOffers();
    this.id=this.http.getId();
  }

  close(){
    this.modalController.dismiss();
  }

}
