import { Component } from '@angular/core';
import { HttpService } from '../../services/http.service';

@Component({
  selector: 'app-tab2',
  templateUrl: 'tab2.page.html',
  styleUrls: ['tab2.page.scss']
})
export class Tab2Page {

  offers: any[];

  constructor(private http: HttpService) {}

  cargarUsuarios(){
  this.http.loadUsers().then(
    (res: any) => {
      this.offers = res.results;
    },
    (error) =>{
      console.error(error);
    }
  );
  }

}
