import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-page2',
  templateUrl: './page2.page.html',
  styleUrls: ['./page2.page.scss'],
})
export class Page2Page implements OnInit {

  constructor() { }

  ngOnInit() {
  }

  OffersPDF(){
    console.log("Offers PDF has been sent");
  }

  ParticipantsPDF(){
    console.log("Participants PDF has been sent");
  }

}
