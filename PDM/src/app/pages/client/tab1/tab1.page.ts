import { Component, ViewChild } from "@angular/core";
import { IonInfiniteScroll } from "@ionic/angular";
import { HttpService } from "src/app/services/http.service";
@Component({
  selector: "app-tab1",
  templateUrl: "tab1.page.html",
  styleUrls: ["tab1.page.scss"],
})
export class Tab1Page {
  @ViewChild(IonInfiniteScroll) infiniteScroll: IonInfiniteScroll;

  noticias: any[];
  obtenidas: any;
  check: any;
  cargadas: any;

  constructor(private http: HttpService) {
    this.check = false;
    this.noticias = [];
    this.cargarNoticiasPorId();
  }

  loadData(event) {
    console.log("Loading");

    setTimeout(() => {
      this.cargarNoticiasPorId(event);
    }, 1000);
  }
  cargarNoticiasPorId(event?) {
    if (event) {
      event.target.disabled = true;
      event.target.complete();
    } else {
      this.http.loadNotices().then(
        (res: any) => {
          if (res.success) {
            if (!this.check) {
              for (let i = 0; i < res.data.length; i++) {
                const element = res.data[i];
                if (element.cicle_id == this.http.getToken().data.cicle_id) {
                  this.noticias = this.noticias.concat(element);
                }
              }
            } else {
              this.noticias = this.noticias.concat(res.data);
            }
          }
        },
        (error) => {
          console.error(error);
        }
      );
    }
    
  }
  onChange() {
    this.cargarNoticiasPorId();
  }
}
