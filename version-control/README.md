# Version control experiments

## Git submodule

Inspects, updates and manages sub git projects

### Commands

*To add a new submodule on project*

```gitexclude
git submodule add $repo
```

*After cloning a repo with submodules*

```gitexclude
git submodule init
git submodule update
```

or 

```gitexclude
git submodule update --init
```

or

```gitexclude
git clone --recurse-submodules $mainrepo
```

*To fetch and merge changes*

```gitexclude
git submodule update --remote $subrepo
```

*To merge local and remote changes on submodule*

```gitexclude
git submodule update --remote --rebase (--merge)
```

*To push local changes*

```gitexclude
git push --recurse-submodules=check
git push --recurse-submodules=on-demand
```