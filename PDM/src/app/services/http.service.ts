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

  loadUsers() {
    return this.http
      .get(this.url2 + '?results=25').toPromise();
  }
  loadNotices() {
    return this.http
      .get(this.url + 'articles').toPromise();
  }

  loadOffers(){
    console.log(this.token.data.token)
    return new Promise(resolve => { 
      this.http.get(this.url + 'offers', 
      { 
        headers: new HttpHeaders().set('Authorization', 'Bearer ' + this.token.data.token)
      }).subscribe(data => { 
        resolve(data); 
      }, err => { console.log(err); 
      }); 
    });
  }

  /**
   * post
   */

  RegisterUser(Nombre: String, Apellido: String, Email: String, contrasena: String, c_constrasena: String, ciclo: Number) {
    const data = {
      name: Nombre,
      surname: Apellido,
      email: Email,
      password: contrasena,
      c_password: c_constrasena,
      cicle_id: ciclo
    }
    console.log(data);
    return new Promise(resolve => {
      this.http.post(this.url + "register", data).subscribe(data => {
        this.token = data;
        resolve(data);
      }, err => {
        console.log(err);
      });
    });
  }
  LoginUser(correo: String, contrasena: String) {
    return new Promise(resolve => { 
      this.http.post(this.url + 'login', 
      { 
        email: correo, 
        password: contrasena
      }).subscribe(data => { 
        this.token = data; 
        resolve(data); 
      }, err => { console.log(err); 
      }); 
    });
  }

}
