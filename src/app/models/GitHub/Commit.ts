export class Commit {
    sha: string;
    author: {name: string; email: string};
    message: string;
    distinct: boolean;
    url: string;
}
