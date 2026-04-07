import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { AuthService } from './auth.service';

@Injectable({
  providedIn: 'root'
})
export class SatelliteService {

  constructor(private httpclient: HttpClient, private auth: AuthService) { }

  /**
   * URL to api
   * @private
   */
  private apiURL = "http://orbitsim.cat/api";
  /**
   * Listar satelites favoritos del usuario
   * @returns lista de satelites favoritos
   */
  getFavoriteSatellite() {
    const token = this.auth.getToken();
    const headers = new HttpHeaders({
      'Authorization': `Bearer ${token}`,
      'Content-Type': 'application/json'
    });

    return this.httpclient.get(`${this.apiURL}/favorites`, { headers });
  }

  /**
   * Listar satelites
   * @returns lista de satelites
   */
  getSatellite() {
    return this.httpclient.get(`${this.apiURL}/satellites`);
  }
  /**
   *
   * @param id id del satelite
   * @returns
   */
  addFavoriteSatellite(id: number) {
    const token = this.auth.getToken()!;
    const headers = new HttpHeaders({
      'Authorization': `Bearer ${token}`
    });
    return this.httpclient.post(`${this.apiURL}/favorites/${id}`, { headers });
  }

  /**
   *
   * @param id id del satelite
   * @returns respuesta de la eliminacion
   */
  removeFavoriteSatellite(id: number) {
    const token = this.auth.getToken()!;
    const headers = new HttpHeaders({
      'Authorization': `Bearer ${token}`
    });
    return this.httpclient.delete(`${this.apiURL}/favorites/${id}`, { headers });
  }
}
