import { Component } from '@angular/core';
import { HttpService } from '../../services/http.service';
@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss']
})
export class Tab1Page {

  usuarios: any[];

  constructor(private http: HttpService) {}

  cargarUsuarios(){
  this.http.loadUsers().then(
    (res: any) => {
      this.usuarios = res.results;
    },
    (error) =>{
      console.error(error);
    }
  );
}
}
