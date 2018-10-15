import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

import { BlogPost } from './models/BlogPost';
import {map} from 'rxjs/operators';
import {Blog} from './models/Blog';

@Injectable({
  providedIn: 'root'
})
export class BlogService {

  constructor(private http: HttpClient) { }

  getPosts(): Observable<BlogPost[]> {
    return this.http.get<Blog>('http://blog.dannyvandersluijs.nl/feed.json')
        .pipe(map(response => response.items));
  }
}
