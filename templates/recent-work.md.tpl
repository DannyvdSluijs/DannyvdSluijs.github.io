---
title: 👨‍💻 Recent Work
---

#### 💻 Check out what I'm currently working on
{{range recentContributions 10}}
- [{{.Repo.Name}}]({{.Repo.URL}}) ({{humanize .OccurredAt}})
{{- end}}


{*#### 📜 My recent blog posts*}
{*{{range rss "https://dannyvandersluijs.nl/feed.xml" 5}}*}
{*- [{{.Title}}]({{.URL}}) ({{humanize .PublishedAt}})*}
{*{{- end}}*}

#### 🔨 My recent Pull Requests
{{range recentPullRequests 15}}
- [{{.Title}}]({{.URL}}) on [{{.Repo.Name}}]({{.Repo.URL}}) ({{humanize .CreatedAt}})
{{- end}}


#### 🔭 Latest releases I've contributed to
{{range recentReleases 10}}
- [{{.Name}}]({{.URL}}) - [{{.LastRelease.TagName}}]({{.LastRelease.URL}}) ({{humanize .LastRelease.PublishedAt}})
{{- end}}