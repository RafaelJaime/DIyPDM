import { Component, ViewChild } from '@angular/core';
import { IonInfiniteScroll } from '@ionic/angular';
import { HttpService } from 'src/app/services/http.service';
@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss']
})
export class Tab1Page {

  @ViewChild(IonInfiniteScroll) infiniteScroll: IonInfiniteScroll;

  noticias: any[];
  check: any;

  constructor(private http: HttpService) {
    this.check = false;
    this.cargarNoticiasPorId();
  }

  cargarNoticias() {
    this.http.loadNotices().then(
      (res: any) => {
        if (res.success) {
          this.noticias = res.data;
          console.log(this.noticias);
        }
      },
      (error) =>{
        console.error(error);
      }
    );
  }
  cargarNoticiasPorId () {
    this.http.loadNotices().then(
      (res: any) => {
        if (res.success) {
          this.noticias = [];
          if (!this.check) {
            for (let i = 0; i < res.data.length; i++) {
              const element = res.data[i];
              if (element.cicle_id == this.http.getToken().data.cicle_id) {
                console.log(element);
                this.noticias.push(element);
              }
            }
          } else {
            this.noticias = res.data;
          }
          console.log(this.noticias);
        }
      },
      (error) =>{
        console.error(error);
      }
    );
  }
  onChange() {
    this.cargarNoticiasPorId();
  }
}