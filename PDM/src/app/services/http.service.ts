import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { summaryFileName } from '@angular/compiler/src/aot/util';
@Injectable({
  providedIn: 'root'
})
export class HttpService {

  url2 = 'https://randomuser.me/api/';
  url = 'https://allsites.es/sales_in_api/public/api/'
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