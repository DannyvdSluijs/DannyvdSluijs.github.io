import {BlogPost} from './BlogPost';

export class Blog {
  title!: string;
  description!: string;
  language!: string;
  link!: string;
  pubDate!: string;
  lastBuilDate!: string;
  generator!: string;
  webMaster!: string;
  items!: BlogPost[];
}
