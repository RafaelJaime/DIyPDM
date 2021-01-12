import { Injectable } from '@angular/core';
<<<<<<< HEAD
import { HttpClient } from '@angular/common/http';
import { summaryFileName } from '@angular/compiler/src/aot/util';
=======
import { HttpClient, HttpHeaders } from '@angular/common/http';
>>>>>>> eb3fc3747a3a72e07bb4950a68f5e39720e37d9a
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

  postUser(Nombre:string, Apellido:string, Email:string, contrasena:string, c_constrasena:string, ciclo:number) {
    const datos = {
      name: Nombre,
      surname: Apellido,
      email: Email,
      password: contrasena,
      c_password: c_constrasena,
      cycle_id: ciclo
    }
    const options = {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      }
    }
    return this.http.post(this.url, JSON.stringify(datos), options).toPromise();
  }
  
}
