import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class HttpService {

  url2 = 'https://randomuser.me/api/';
  url = 'https://allsites.es/sales_in_api/public/api/'
  constructor(public http: HttpClient) { }
  loadUsers(){
    return this.http
   .get( this.url2 + '?results=25').toPromise();
  }
  loadNotices() {
    return this.http
    .get( this.url + 'articles').toPromise();
  }
}