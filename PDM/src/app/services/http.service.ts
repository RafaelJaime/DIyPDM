import { Injectable } from '@angular/core';
import { summaryFileName } from '@angular/compiler/src/aot/util';
import { HttpClient, HttpHeaders } from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class HttpService {

  url2 = 'https://randomuser.me/api/';
  url = 'https://allsites.es/sales_in_api/public/api/';

  token: any;

  constructor(public http: HttpClient) { }

  /**
   * Get
   */

  loadUsers(){
    return this.http
   .get( this.url2 + '?results=25').toPromise();
  }
  loadNotices() {
    return this.http
    .get( this.url + 'articles').toPromise();
  }

  /**
   * post
   */

  postUser(Nombre:String, Apellido:String, Email:String, contrasena:String, c_constrasena:String, ciclo:Number) {
    const data = {
      name: Nombre,
      surname: Apellido,
      email: Email,
      password: contrasena,
      c_password: c_constrasena,
      cycle_id: ciclo
    }
    console.log(data);
    const options = {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      }
    }
    return this.http.post(this.url + "register", JSON.stringify(data), options).toPromise();
  }
  
}
