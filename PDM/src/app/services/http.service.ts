import { Injectable } from "@angular/core";
import { summaryFileName } from "@angular/compiler/src/aot/util";
import { HttpClient, HttpHeaders } from "@angular/common/http";
import { off } from "process";
@Injectable({
  providedIn: "root",
})
export class HttpService {
  url = "https://allsites.es/sales_in_api/public/api/";

  token: any;

  id: number;

  offers: any[];

  constructor(public http: HttpClient) {}

  setId(id: number) {
    this.id = id;
  }
  getId() {
    return this.id;
  }

  setOffers(offers: any) {
    this.offers = offers;
  }

  getOffers() {
    return this.offers;
  }

  /**
   * Get
   */
  loadNotices() {
    return this.http.get(this.url + "articles").toPromise();
  }

  loadOffers() {
    return new Promise((resolve) => {
      this.http
        .get(this.url + "offers", {
          headers: new HttpHeaders().set(
            "Authorization",
            "Bearer " + this.token.data.token
          ),
        })
        .subscribe(
          (data) => {
            resolve(data);
          },
          (err) => {
            console.log(err);
          }
        );
    });
  }

  loadOffersApplied() {
    console.log(this.token.data.id);
    return new Promise((resolve) => {
      this.http
        .get(this.url + "offersApplied/" + this.token.data.id, {
          headers: new HttpHeaders().set(
            "Authorization",
            "Bearer " + this.token.data.token
          ),
        })
        .subscribe(
          (data) => {
            resolve(data);
          },
          (err) => {
            console.log(err);
          }
        );
    });
  }
  getUsers() {
    return new Promise((resolve) => {
      this.http
        .get(this.url + "users", {
          headers: new HttpHeaders().set(
            "Authorization",
            "Bearer " + this.token.data.token
          ),
        })
        .subscribe(
          (data) => {
            resolve(data);
          },
          (err) => {
            console.log(err);
          }
        );
    });
  }

  /**
   * post
   */

  RegisterUser(
    Nombre: String,
    Apellido: String,
    Email: String,
    contrasena: String,
    c_constrasena: String,
    ciclo: Number
  ) {
    const data = {
      name: Nombre,
      surname: Apellido,
      email: Email,
      password: contrasena,
      c_password: c_constrasena,
      cicle_id: ciclo,
    };
    console.log(data);
    return new Promise((resolve) => {
      this.http.post(this.url + "register", data).subscribe(
        (data) => {
          this.token = data;
          resolve(data);
        },
        (err) => {
          console.log(err);
        }
      );
    });
  }
  LoginUser(correo: String, contrasena: String) {
    return new Promise((resolve) => {
      this.http
        .post(this.url + "login", {
          email: correo,
          password: contrasena,
        })
        .subscribe(
          (data) => {
            console.log(data);
            this.token = data;
            resolve(data);
          },
          (err) => {
            console.log(err);
          }
        );
    });
  }

  OffersApply() {
    return new Promise((resolve) => {
      this.http
        .post(this.url + "applied/", {
          headers: new HttpHeaders().set(
            "Authorization",
            "Bearer " + this.token.data.token
          ),
        })
        .subscribe(
          (data) => {
            resolve(data);
          },
          (err) => {
            console.log(err);
          }
        );
    });
  }

  ApplyOffer(id: Number) {
    return new Promise((resolve) => {
      this.http
        .post(
          this.url + "applied",
          {
            user_id: this.token.data.id,
            offer_id: id,
          },
          {
            headers: new HttpHeaders().set(
              "Authorization",
              "Bearer " + this.token.data.token
            ),
          }
        )
        .subscribe(
          (data) => {
            console.log(data);
            resolve(data);
          },
          (err) => {
            console.log(err);
          }
        );
    });
  }
  actevateUser(id: Number) {
    return new Promise((resolve) => {
      this.http
        .post(
          this.url + "activate",
          { user_id: String(id) },
          {
            headers: new HttpHeaders().set(
              "Authorization",
              "Bearer " + this.token.data.token
            ),
          }
        )
        .subscribe(
          (data) => {
            console.log(data);
            resolve(data);
          },
          (err) => {
            console.log(err);
          }
        );
    });}
}
