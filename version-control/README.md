# Version control experiments

## Git submodule

Inspects, updates and manages sub git projects

### Commands

*To add a new submodule on project*

```bash
git submodule add $repo
```

*After cloning a repo with submodules*

```bash
git submodule init
git submodule update
```

or 

```bash
git submodule update --init
```

or

```bash
git clone --recurse-submodules $mainrepo
```

*To fetch and merge changes*

```bash
git submodule update --remote $subrepo
```

*To merge local and remote changes on submodule*

```bash
git submodule update --remote --rebase (--merge)
```

*To push local changes*

```bash
git push --recurse-submodules=check
git push --recurse-submodules=on-demand
```

*To execute command for all submodules

```bash
git submodule foreach 'git status'
```