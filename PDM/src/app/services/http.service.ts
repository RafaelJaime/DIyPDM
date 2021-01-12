import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class HttpService {

  url = 'https://randomuser.me/api/';
  constructor(public http: HttpClient) { }
  loadUsers(){
    return this.http
   .get( this.url + '?results=25').toPromise();
  }
}
