import { Component, OnInit } from '@angular/core';
import {HttpService} from '../../services/http.service';
import { Router } from '@angular/router';
@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {

  email: string;
  password: string;
  token: any;
  
  constructor(private http: HttpService, private router: Router) { }

  ngOnInit() {
  }

  hacerLogin() {
    this.http.LoginUser(this.email, this.password)
      .then(data => {
        this.token = data;
        console.log(this.token);
        if (this.token.success) {
          this.router.navigate(['/tabs/tab1'])
        }
      });
  }
}
