import { Component, OnInit } from '@angular/core';
import { HttpService } from 'src/app/services/http.service';

@Component({
  selector: 'app-page1',
  templateUrl: './page1.page.html',
  styleUrls: ['./page1.page.scss'],
})
export class Page1Page implements OnInit {

  users:any;

  actual:any;
  constructor(private http: HttpService) {
    // http.LoginUser('raulreyes@gmail.com', '123456');
    this.cargarUsers();
  }

  ngOnInit() {
  }
  cargarUsers() {
    this.http.getUsers().then(
      (res: any) => {
        if (res.success) {
          this.users = res.data;
          console.log(res.data);
        }
      },
      (error) => {
        console.error(error);
      }
    );
  }
  Activate(id:number){
    this.http.actevateUser(id);
    this.cargarUsers();
  }

}
