import { Component, OnInit } from '@angular/core';
import {HttpService} from '../../services/http.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.page.html',
  styleUrls: ['./register.page.scss'],
})
export class RegisterPage implements OnInit {

  name: string;
  surname: string;
  email: string;
  password: string;
  c_password: string;
  cycle_id: number;
  constructor(private http: HttpService) { }

  ngOnInit() {
  }
  say(){
    this.http.postUser(this.name, this.surname, this.email, this.password, this.c_password, this.cycle_id).then(res=>{
      alert(JSON.stringify(res));
    });
    console.log();
  }

}
