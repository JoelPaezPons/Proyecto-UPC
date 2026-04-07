import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable, tap } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private apiUrl = 'http://orbitsim.cat/api';

  constructor(private http: HttpClient) {}

  /**
   * Login function
   * @param email user email
   * @param password user password
   */
  login(email: string, password: string): Observable<any> {
    return this.http.post(`${this.apiUrl}/login`, { email, password }).pipe(
      tap((response: any) => {
        localStorage.setItem('token', response.access_token); // saves the generated token to the localStorage
      })
    );
  }

  /**
   * Register user function
   * @param name new username
   * @param email new user email
   * @param password new user password
   * @param password_confirmation password confirmation
   */
  register(name: string, email: string, password: string, password_confirmation: string): Observable<any> {
    return this.http.post(`${this.apiUrl}/register`, { name, email, password, password_confirmation }).pipe(
      tap((response: any) => {
        localStorage.setItem('token', response.access_token);
      })
    );
  }

  /**
   * Logout function
   */
  logout(): Observable<any> {
    return this.http.post(`${this.apiUrl}/logout`, {}).pipe(
      tap(() => localStorage.removeItem('token'))
    );
  }

  /**
   * Function to retrieve the value of the token
   */
  getToken(): string | null {
    return localStorage.getItem('token');
  }

  /**
   * Function to check if the user is logged
   */
  isLoggedIn(): boolean {
    return !!this.getToken();
  }
}
