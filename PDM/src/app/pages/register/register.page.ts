import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-register',
  templateUrl: './register.page.html',
  styleUrls: ['./register.page.scss'],
})
export class RegisterPage implements OnInit {


  userh = new User();
  constructor() { }

  ngOnInit() {
  }

}

export class User{
  name: string;
  surname: string;
  email: string;
  password: string;
  c_password: string;
  cycle_id: number;
}
