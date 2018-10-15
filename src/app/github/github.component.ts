import { Component, OnInit } from '@angular/core';

import { GithubService } from '../github.service';
import { GithubRepository } from '../github-repository';
import {map} from 'rxjs/operators';

@Component({
  selector: 'app-github',
  templateUrl: './github.component.html',
  styleUrls: ['./github.component.css']
})
export class GithubComponent implements OnInit {

  repositories: GithubRepository[];

  constructor(private gitHubService: GithubService) { }

  ngOnInit() {
    this.getRepositories();
  }

  getRepositories(): void {
    this.gitHubService.getRepositories()
      .pipe(map(data => data.filter(githubRepository => githubRepository.fork === false)))
      .subscribe(repositories => this.repositories = repositories);
  }
}
