import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AuthService } from '../../services/auth.service';
import { SatelliteService } from '../../services/satellite.service';


@Component({
  selector: 'app-satelites',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './satellite.component.html',
  styleUrl: './satellite.component.css'
})
export class SatelliteComponent {
  listaSatellite: any[] = [];
  listaFavoritos: any[] = [];


  constructor(public authService: AuthService, private satellite: SatelliteService) {
    this.initSatellites();
    this.getAllSatellites();
    console.log(this.listaSatellite);
  }

  /**
   *
   */
  initSatellites() {
    // recoger satelites favoritos
    if (this.authService.isLoggedIn()) {
      this.getFavoritesSatellites();
    }
    // recoger todos los satelites
    this.getAllSatellites();

  }

  //list satellite functions
  /**
   * List favorite satellites
   */
  getFavoritesSatellites() {
    this.satellite.getFavoriteSatellite().subscribe(data => {
      // @ts-ignore
      this.listaFavoritos = data;
    });
  }

  /**
   * List all satellites
   */
  getAllSatellites() {
    this.satellite.getSatellite().subscribe(satelites => {
      //@ts-ignore
      this.listaSatellite = satelites;
    });
  }

  /**
   * Remove favorite satellite from user favorites list
   * @param id Satellite id
   */
  removeFavorite(id: number) {
    const res = this.satellite.removeFavoriteSatellite(id); // recoger response para eliminar los favoritos
    res.subscribe(); // aplicar los efectos
    this.getFavoritesSatellites();


  }

  /**
   * Function used to add satellites to the user's favorites list
   * @param id Satellite id
   */
  addFavoriteSatellite(id: number) {
    const res = this.satellite.addFavoriteSatellite(id); // recoger response para añadir los favoritos
    res.subscribe(); // aplicar los efectos
    this.getFavoritesSatellites();

  }

  // listaSatelites = [
  //   { name: 'Hubble', photo: 'img/satelite1.jpg' },
  //   { name: 'ISS', photo: 'img/satelite2.jpg' },
  //   { name: 'Starlink', photo: 'img/satelite3.jpg' },
  //   { name: 'James Webb', photo: 'img/satelite4.jpg' },
  //   { name: 'GOES-R', photo: 'img/satelite5.jpg' },
  //   { name: 'Landsat 9', photo: 'img/satelite6.jpg' },
  //   { name: 'Galileo', photo: 'img/satelite7.jpg' },
  //   { name: 'Kepler', photo: 'img/satelite8.jpg' },
  //   { name: 'Sputnik 1', photo: 'img/satelite9.jpg' }
  // ];
}
