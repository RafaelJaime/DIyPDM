import { Component } from '@angular/core';
import { HttpService } from '../../services/http.service';
@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss']
})
export class Tab1Page {

  usuarios: any[];

  noticias: any[];

  constructor(private http: HttpService) {}

  cargarUsuarios(){
  this.http.loadUsers().then(
    (res: any) => {
      this.usuarios = res.results;
    },
    (error) =>{
      console.error(error);
    }
  )};
  cargarNoticias() {
    this.http.loadNotices().then(
      (res: any) => {
        if (res.success) {
          this.noticias = res.data;
        }
      },
      (error) =>{
        console.error(error);
      }
    );
  }
}