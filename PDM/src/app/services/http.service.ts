import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class HttpService {

  url2 = 'https://randomuser.me/api/';
  url = 'https://allsites.es/sales_in_api/public/api/';

  token: any;

  constructor(public http: HttpClient) { }
  loadUsers(){
    return this.http
   .get( this.url2 + '?results=25').toPromise();
  }
  loadNotices() {
    return this.http
    .get( this.url + 'articles').toPromise();
  }
  loadOffers() {
    return this.http
    .get( this.url + 'offers').toPromise();
  }
  getProducts(tok: any) {
    return new Promise(resolve => {
    this.http.get(this.url + '/offers', {
    headers: new HttpHeaders().set('Authorization', 'Bearer ' + tok.success.token),
    })
    .subscribe(data => {
    resolve(data);
    }, err => {
    console.log(err);
    });
    });
   }
   login() {
    return new Promise(resolve => {
    this.http.post(this.url + '/login',
    {
    email: 'raul@raul.com',
    password: '123456'
    })
    .subscribe(data => {
    this.token = data;
    resolve(data);
    }, err => {
    console.log(err);
    });
    });
    }
   }
