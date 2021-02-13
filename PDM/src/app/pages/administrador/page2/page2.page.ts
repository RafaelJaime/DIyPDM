import { Component, OnInit } from "@angular/core";
import { PDFGenerator } from "@ionic-native/pdf-generator";

declare var cordova: any;
@Component({
  selector: "app-page2",
  templateUrl: "./page2.page.html",
  styleUrls: ["./page2.page.scss"],
})
export class Page2Page implements OnInit {
  constructor() {}

  ngOnInit() {}

  OffersPDF() {
    console.log("Offers PDF has been sent");
  }

  ParticipantsPDF() {
    let options = {
      documentSize: "A4",
      type: "base64",
    };

    PDFGenerator
      .fromData("<html><h1>Hello World</h1></html>", options)
      .then((stats) => console.log("status", stats))
      .catch((err) => console.log(err));
    console.log("Participants PDF has been sent");
  }
}
