import { Component } from '@angular/core';
import { HttpService } from '../../services/http.service';
@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss']
})
export class Tab1Page {

  noticias: any[];

  constructor(private http: HttpService) {
    this.cargarNoticias();
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
}