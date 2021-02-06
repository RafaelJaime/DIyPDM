import { Component, OnInit } from '@angular/core';
import {HttpService} from '../../services/http.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-register',
  templateUrl: './register.page.html',
  styleUrls: ['./register.page.scss'],
})
export class RegisterPage implements OnInit {
  token: any;
  name: string;
  surname: string;
  email: string;
  password: string;
  c_password: string;
  cicle_id: number;
  cicles: any[];
  constructor(private http: HttpService, private router: Router) {
    this.loadCicles();
  }

  ngOnInit() {
  }
  say(){
    this.http.RegisterUser(this.name, this.surname, this.email, this.password, this.c_password, this.cicle_id)
    .then( res=>{
      this.token = res;
      if (this.token.success) {
        this.router.navigate(['/tabs/tab1'])
      }
    });
  }
  loadCicles() {
    this.http.getCicles().then(
      (res: any) => {
        if (res.success) {
          this.cicles = res.data;
          console.log(this.cicles);
        }
      },
      (error) =>{
        console.error(error);
      }
    );
  }
}