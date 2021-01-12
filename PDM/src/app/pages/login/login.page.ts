import { Component, OnInit } from '@angular/core';
import {HttpService} from '../../services/http.service';
@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {

  constructor(private http: HttpService) { }

  ngOnInit() {
  }
}
