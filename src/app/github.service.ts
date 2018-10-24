import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

import { Repository } from './models/GitHub/Repository';
import { Activity } from './models/GitHub/Activity';

@Injectable({
  providedIn: 'root'
})
export class GithubService {

  constructor(private http: HttpClient) { }

  getRepositories(): Observable<Repository[]> {
    return this.http.get<Repository[]>('https://api.github.com/users/dannyvdsluijs/repos?per_page=100&sort=updated');
  }

  getActivities(): Observable<Activity[]> {
    return this.http.get<Activity[]>('https://api.github.com/users/dannyvdsluijs/events');
  }
}
