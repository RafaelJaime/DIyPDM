import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import { IonicModule } from '@ionic/angular';
import { HeaderAdminComponent } from './header-admin.component';

@NgModule({
    declarations: [HeaderAdminComponent],
    imports: [CommonModule, IonicModule],
    exports: [HeaderAdminComponent],
})

export class HeaderAdminModule{}