import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

import { GithubRepository } from './github-repository';
import { GithubActivity } from './github-activity';

@Injectable({
  providedIn: 'root'
})
export class GithubService {

  constructor(private http: HttpClient) { }

  getRepositories(): Observable<GithubRepository[]> {
    return this.http.get<GithubRepository[]>('https://api.github.com/users/dannyvdsluijs/repos?per_page=100&sort=updated');
  }

  getActivities(): Observable<GithubActivity[]> {
    return this.http.get<GithubActivity[]>('https://api.github.com/users/dannyvdsluijs/events');
  }
}
