import { Component } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { CommonModule } from '@angular/common';
import { Router } from '@angular/router';
import { AuthService } from '../../services/auth.service';


@Component({
  selector: 'app-nav',
  imports: [RouterLink, RouterLinkActive, CommonModule],
  templateUrl: './nav.component.html',
  styleUrl: './nav.component.css'
})
export class NavComponent {
  constructor(public authService: AuthService, private router: Router) {}

  goToBackoffice() {
    this.router.navigate(['/backoffice']);
  }
  logout() {
  this.authService.logout().subscribe({
    next: () => this.router.navigate(['/home']),
    error: () => {
      // Aunque falle el servidor, borramos el token igualmente
      localStorage.removeItem('token');
      this.router.navigate(['/home']);
    }
  });
}
}
