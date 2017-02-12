<header class="nav" id="header-nav">
    <div class="container">
        <div class="nav-left">
            <a class="nav-item is-brand" href="/">
                <span class="title" style="font-weight:bold;">
                    {{--
                    <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSI2MHB4IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1NiA2MCIgd2lkdGg9IjU2cHgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjx0aXRsZS8+PGRlc2MvPjxkZWZzLz48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGlkPSJQZW9wbGUiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIj48ZyBmaWxsPSIjMDAwMDAwIiBpZD0iSWNvbi05IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMi4wMDAwMDAsIDAuMDAwMDAwKSI+PHBhdGggZD0iTTIyLDI3IEMyMiwyNy41NTEgMjIuNDQ4LDI4IDIzLDI4IEMyMy41NTIsMjggMjQsMjcuNTUxIDI0LDI3IEMyNCwyNi40NDkgMjMuNTUyLDI2IDIzLDI2IEMyMi40NDgsMjYgMjIsMjYuNDQ5IDIyLDI3IEwyMiwyNyBaIE0yNCw0NSBDMjQsNDQuNDQ5IDIzLjU1Miw0NCAyMyw0NCBDMjIuNDQ4LDQ0IDIyLDQ0LjQ0OSAyMiw0NSBDMjIsNDUuNTUxIDIyLjQ0OCw0NiAyMyw0NiBDMjMuNTUyLDQ2IDI0LDQ1LjU1MSAyNCw0NSBMMjQsNDUgWiBNMTYsMjcgQzE2LDI2LjQ0OSAxNS41NTIsMjYgMTUsMjYgQzE0LjQ0OCwyNiAxNCwyNi40NDkgMTQsMjcgQzE0LDI3LjU1MSAxNC40NDgsMjggMTUsMjggQzE1LjU1MiwyOCAxNiwyNy41NTEgMTYsMjcgTDE2LDI3IFogTTE2LDM5IEMxNiwzOC40NDkgMTUuNTUyLDM4IDE1LDM4IEMxNC40NDgsMzggMTQsMzguNDQ5IDE0LDM5IEMxNCwzOS41NTEgMTQuNDQ4LDQwIDE1LDQwIEMxNS41NTIsNDAgMTYsMzkuNTUxIDE2LDM5IEwxNiwzOSBaIE0yMiwxNyBDMjIsMTcuNTUxIDIyLjQ0OCwxOCAyMywxOCBDMjMuNTUyLDE4IDI0LDE3LjU1MSAyNCwxNyBDMjQsMTYuNDQ5IDIzLjU1MiwxNiAyMywxNiBDMjIuNDQ4LDE2IDIyLDE2LjQ0OSAyMiwxNyBMMjIsMTcgWiBNMTYsMTggTDE2LDI0LjE4NCBDMTYuODQ4LDI0LjQ4NiAxNy41MTQsMjUuMTUzIDE3LjgxNSwyNiBMMjAuMTg1LDI2IEMyMC41OTksMjQuODM4IDIxLjY5OCwyNCAyMywyNCBDMjQuNjU0LDI0IDI2LDI1LjM0NiAyNiwyNyBDMjYsMjguMzAyIDI1LjE2MSwyOS40MDEgMjQsMjkuODE2IEwyNCw0Mi4xODQgQzI1LjE2MSw0Mi41OTkgMjYsNDMuNjk4IDI2LDQ1IEMyNiw0Ni4zMDIgMjUuMTYxLDQ3LjQwMSAyNCw0Ny44MTYgTDI0LDUxIEMyNCw1MS41NTIgMjMuNTUzLDUyIDIzLDUyIEMyMi40NDcsNTIgMjIsNTEuNTUyIDIyLDUxIEwyMiw0Ny44MTUgQzIwLjk3OSw0Ny40NTIgMjAuMjE4LDQ2LjU1OCAyMC4wNDcsNDUuNDYgTDE2LjI5Myw0MS43MDcgQzE2LjI5LDQxLjcwNSAxNi4yOSw0MS43MDEgMTYuMjg3LDQxLjY5OCBDMTUuODk2LDQxLjg4NiAxNS40NjMsNDIgMTUsNDIgQzEzLjM0Niw0MiAxMiw0MC42NTQgMTIsMzkgQzEyLDM3LjM0NiAxMy4zNDYsMzYgMTUsMzYgQzE2LjY1NCwzNiAxOCwzNy4zNDYgMTgsMzkgQzE4LDM5LjQ2MiAxNy44ODYsMzkuODk2IDE3LjY5OCw0MC4yODcgQzE3LjcwMSw0MC4yOSAxNy43MDQsNDAuMjkxIDE3LjcwNyw0MC4yOTMgTDIwLjYxNCw0My4yMDEgQzIwLjk2NSw0Mi43MzcgMjEuNDQzLDQyLjM4MyAyMiw0Mi4xODQgTDIyLDI5LjgxNSBDMjEuMTUyLDI5LjUxNCAyMC40ODYsMjguODQ3IDIwLjE4NSwyOCBMMTcuODE1LDI4IEMxNy40MDEsMjkuMTYyIDE2LjMwMiwzMCAxNSwzMCBDMTMuMzQ2LDMwIDEyLDI4LjY1NCAxMiwyNyBDMTIsMjUuNjk4IDEyLjgzOSwyNC41OTkgMTQsMjQuMTg0IEwxNCwxNyBDMTQsMTYuNDQ4IDE0LjQ0NywxNiAxNSwxNiBMMjAuMTg1LDE2IEMyMC40ODYsMTUuMTUzIDIxLjE1MiwxNC40ODYgMjIsMTQuMTg0IEwyMiwxMSBDMjIsMTAuNDQ4IDIyLjQ0NywxMCAyMywxMCBDMjMuNTUzLDEwIDI0LDEwLjQ0OCAyNCwxMSBMMjQsMTQuMTg0IEMyNS4xNjEsMTQuNTk5IDI2LDE1LjY5OCAyNiwxNyBDMjYsMTguNjU0IDI0LjY1NCwyMCAyMywyMCBDMjEuNjk4LDIwIDIwLjU5OSwxOS4xNjIgMjAuMTg1LDE4IEwxNiwxOCBaIE01NS42MzMsMzcuMjQ1IEM1Ny4xMjIsMzUuOTM2IDU4LDM0LjA0MiA1OCwzMiBDNTgsMjkuODYgNTcuMDQ5LDI3Ljg5NCA1NS40MTUsMjYuNTc0IEM1NS44LDI1Ljc3MSA1NiwyNC44OTYgNTYsMjQgQzU2LDIxLjkzNiA1NC45MTcsMjAuMDM1IDUzLjIwOCwxOC45NSBDNTMuNzI0LDE4LjA1MSA1NCwxNy4wMzcgNTQsMTYgQzU0LDEzLjQyIDUyLjM2MSwxMS4xNzcgNDkuOTg5LDEwLjM0OSBDNDkuOTk2LDEwLjIzMiA1MCwxMC4xMTYgNTAsMTAgQzUwLDYuNjkxIDQ3LjMwOSw0IDQ0LDQgQzQzLjE5Myw0IDQyLjQwNyw0LjE2NCA0MS42NzMsNC40OCBDNDAuODEzLDEuODc2IDM4LjM0LDAgMzUuNSwwIEMzMS4yOTIsMCAyOS40MjEsMy43OTYgMjkuMDIsNS44MDQgQzI5LjAxMyw1LjgzNyAyOS4wMjIsNS44NjkgMjkuMDIsNS45MDMgQzI5LjAxNyw1LjkzNyAyOSw1Ljk2NSAyOSw2IEwyOSw1Mi45NCBDMjguNzc0LDU1Ljc3OSAyNi4zNjMsNTggMjMuNSw1OCBDMjAuNjQ3LDU4IDE4LjI0Myw1NS43NzEgMTguMDI2LDUyLjkyNCBDMTcuOTg2LDUyLjQwMyAxNy41MjIsNTIgMTcsNTIgQzE2LjY4OCw1MiAxNi4zOTQsNTIuMTQ2IDE2LjIwNCw1Mi4zOTQgQzE1LjQyOCw1My40MTUgMTQuMjYsNTQgMTMsNTQgQzEwLjc5NCw1NCA5LDUyLjIwNiA5LDUwIEM5LDQ5LjA5MiA5LjMxNiw0OC4yMjQgOS45MTYsNDcuNDg5IEMxMC4xODYsNDcuMTU4IDEwLjIxNiw0Ni42OTEgOS45ODksNDYuMzI4IEM5Ljc2Myw0NS45NjUgOS4zMzUsNDUuNzg1IDguOTEzLDQ1Ljg4NCBDOC41NzgsNDUuOTYyIDguMjc5LDQ2IDgsNDYgQzUuNzk0LDQ2IDQsNDQuMjA2IDQsNDIgQzQsNDAuMzUxIDUuMDQ3LDM4Ljg1MSA2LjYwNCwzOC4yNjcgQzYuOTc1LDM4LjEyOCA3LjIyOSwzNy43ODQgNy4yNTIsMzcuMzkgQzcuMjc1LDM2Ljk5NSA3LjA2MywzNi42MjMgNi43MTMsMzYuNDQyIEM1LjAzOSwzNS41NzkgNCwzMy44NzYgNCwzMiBDNCwzMC4yMzYgNC45MDcsMjguNjM2IDYuNDI3LDI3LjcyIEM2LjY2NCwyNy41NzcgNi44MzEsMjcuMzQyIDYuODg5LDI3LjA3MSBDNi45NDYsMjYuNzk5IDYuODg4LDI2LjUxNyA2LjcyOSwyNi4yOSBDNi4yNTIsMjUuNjA5IDYsMjQuODE4IDYsMjQgQzYsMjIuMzM5IDcuMDU4LDIwLjgzNiA4LjYzMSwyMC4yNTkgQzguOTQyLDIwLjE0NSA5LjE3NywxOS44ODQgOS4yNTgsMTkuNTYzIEM5LjMzOCwxOS4yNDEgOS4yNTMsMTguOSA5LjAzMiwxOC42NTMgQzguMzY2LDE3LjkxIDgsMTYuOTY4IDgsMTYgQzgsMTQuMDYyIDkuMzg5LDEyLjQxMSAxMS4zMDEsMTIuMDczIEMxMS41NjksMTIuMDI1IDExLjgwOCwxMS44NyAxMS45NTksMTEuNjQzIEMxMi4xMSwxMS40MTYgMTIuMTYyLDExLjEzNyAxMi4xMDQsMTAuODcxIEMxMi4wMzQsMTAuNTU5IDEyLDEwLjI3NCAxMiwxMCBDMTIsNy43OTQgMTMuNzk0LDYgMTYsNiBDMTYuODY2LDYgMTcuNzAxLDYuMjg5IDE4LjQxNiw2LjgzNiBDMTguNzA3LDcuMDU4IDE5LjA5Niw3LjEwNCAxOS40MjksNi45NTYgQzE5Ljc2NCw2LjgwNyAxOS45OSw2LjQ4OCAyMC4wMjEsNi4xMjQgQzIwLjIxMSwzLjgxMiAyMi4xNzksMiAyNC41LDIgQzI1LjYxNCwyIDI2LjUzNSwyLjM1OCAyNy4zMTUsMy4wOTQgQzI3LjcxOCwzLjQ3MyAyOC4zNTEsMy40NTQgMjguNzI5LDMuMDUyIEMyOS4xMDgsMi42NSAyOS4wOSwyLjAxOCAyOC42ODgsMS42MzkgQzI3LjUzNSwwLjU1MSAyNi4xMjYsMCAyNC41LDAgQzIxLjY2LDAgMTkuMTg3LDEuODc2IDE4LjMyNyw0LjQ4IEMxNy41OTMsNC4xNjQgMTYuODA3LDQgMTYsNCBDMTIuNjkxLDQgMTAsNi42OTEgMTAsMTAgQzEwLDEwLjExNiAxMC4wMDQsMTAuMjMyIDEwLjAxMSwxMC4zNDkgQzcuNjM5LDExLjE3NyA2LDEzLjQyIDYsMTYgQzYsMTcuMDM3IDYuMjc2LDE4LjA1MSA2Ljc5MiwxOC45NSBDNS4wODMsMjAuMDM1IDQsMjEuOTM2IDQsMjQgQzQsMjQuODk2IDQuMiwyNS43NzEgNC41ODUsMjYuNTc0IEMyLjk1MSwyNy44OTQgMiwyOS44NiAyLDMyIEMyLDM0LjA0MiAyLjg3OCwzNS45MzYgNC4zNjcsMzcuMjQ1IEMyLjkwNiwzOC4zNjIgMiw0MC4xMTYgMiw0MiBDMiw0NS4wOTMgNC4zNTMsNDcuNjQ3IDcuMzYzLDQ3Ljk2NiBDNy4xMjMsNDguNjE0IDcsNDkuMjk4IDcsNTAgQzcsNTMuMzA5IDkuNjkxLDU2IDEzLDU2IEMxNC4yNDIsNTYgMTUuNDI0LDU1LjYyMyAxNi40MTYsNTQuOTMyIEMxNy40MzYsNTcuODg2IDIwLjI1NSw2MCAyMy41LDYwIEMyNy40MDgsNjAgMzAuNzAxLDU2Ljk1OCAzMC45OTcsNTMuMDc2IEMzMC45OTgsNTMuMDYzIDMwLjk5Miw1My4wNTEgMzAuOTkyLDUzLjAzOCBDMzAuOTkzLDUzLjAyNCAzMSw1My4wMTQgMzEsNTMgTDMxLDYuMTEgQzMxLjE0OCw1LjQ5NiAzMi4xMzUsMiAzNS41LDIgQzM3LjgyMSwyIDM5Ljc4OSwzLjgxMiAzOS45NzksNi4xMjQgQzQwLjAxLDYuNDg4IDQwLjIzNiw2LjgwNyA0MC41NzEsNi45NTYgQzQwLjkwNCw3LjEwNCA0MS4yOTMsNy4wNTggNDEuNTg0LDYuODM2IEM0Mi4yOTksNi4yODkgNDMuMTM0LDYgNDQsNiBDNDYuMjA2LDYgNDgsNy43OTQgNDgsMTAgQzQ4LDEwLjI3NCA0Ny45NjYsMTAuNTU5IDQ3Ljg5NiwxMC44NzEgQzQ3LjgzOCwxMS4xMzcgNDcuODksMTEuNDE2IDQ4LjA0MSwxMS42NDMgQzQ4LjE5MiwxMS44NyA0OC40MzEsMTIuMDI1IDQ4LjY5OSwxMi4wNzMgQzUwLjYxMSwxMi40MTEgNTIsMTQuMDYyIDUyLDE2IEM1MiwxNi45NjggNTEuNjM0LDE3LjkxIDUwLjk2OCwxOC42NTMgQzUwLjc0NywxOC45IDUwLjY2MiwxOS4yNDEgNTAuNzQyLDE5LjU2MyBDNTAuODIzLDE5Ljg4NCA1MS4wNTgsMjAuMTQ1IDUxLjM2OSwyMC4yNTkgQzUyLjk0MiwyMC44MzYgNTQsMjIuMzM5IDU0LDI0IEM1NCwyNC44MTggNTMuNzQ4LDI1LjYwOSA1My4yNzEsMjYuMjkgQzUzLjExMiwyNi41MTcgNTMuMDU0LDI2Ljc5OSA1My4xMTEsMjcuMDcxIEM1My4xNjksMjcuMzQyIDUzLjMzNiwyNy41NzcgNTMuNTczLDI3LjcyIEM1NS4wOTMsMjguNjM2IDU2LDMwLjIzNiA1NiwzMiBDNTYsMzMuODc2IDU0Ljk2MSwzNS41NzkgNTMuMjg3LDM2LjQ0MiBDNTIuOTM3LDM2LjYyMyA1Mi43MjUsMzYuOTk1IDUyLjc0OCwzNy4zOSBDNTIuNzcxLDM3Ljc4NCA1My4wMjUsMzguMTI4IDUzLjM5NiwzOC4yNjcgQzU0Ljk1MywzOC44NTEgNTYsNDAuMzUxIDU2LDQyIEM1Niw0NC4yMDYgNTQuMjA2LDQ2IDUyLDQ2IEM1MS43MjEsNDYgNTEuNDIyLDQ1Ljk2MiA1MS4wODcsNDUuODg0IEM1MC42NjcsNDUuNzg1IDUwLjIzOCw0NS45NjUgNTAuMDExLDQ2LjMyOCBDNDkuNzg0LDQ2LjY5MSA0OS44MTQsNDcuMTU4IDUwLjA4NCw0Ny40ODkgQzUwLjY4NCw0OC4yMjQgNTEsNDkuMDkyIDUxLDUwIEM1MSw1Mi4yMDYgNDkuMjA2LDU0IDQ3LDU0IEM0NS43MzYsNTQgNDQuNTcsNTMuNDA4IDQzLjgwMiw1Mi4zNzUgQzQzLjU0NCw1Mi4wMyA0My4wOTUsNTEuODg5IDQyLjY4Niw1Mi4wMjMgQzQyLjUzOCw1Mi4wNzIgNDIuNDA4LDUyLjE1MyA0Mi4zMDMsNTIuMjU2IEM0Mi4xMTcsNTIuNDIyIDQxLjk5NCw1Mi42NTggNDEuOTc0LDUyLjkyNCBDNDEuNzU3LDU1Ljc3MSAzOS4zNTMsNTggMzYuNSw1OCBDMzUuMjQzLDU4IDM0LjA1Nyw1Ny41ODcgMzMuMDcsNTYuODA2IEMzMi42MzUsNTYuNDYzIDMyLjAwOCw1Ni41MzcgMzEuNjY1LDU2Ljk2OSBDMzEuMzIyLDU3LjQwMiAzMS4zOTYsNTguMDMxIDMxLjgyOCw1OC4zNzQgQzMzLjE1Myw1OS40MjIgMzQuODEzLDYwIDM2LjUsNjAgQzM5Ljc0Nyw2MCA0Mi41NjgsNTcuODgyIDQzLjU4Niw1NC45MjUgQzQ0LjU3NSw1NS42MjEgNDUuNzU1LDU2IDQ3LDU2IEM1MC4zMDksNTYgNTMsNTMuMzA5IDUzLDUwIEM1Myw0OS4yOTggNTIuODc3LDQ4LjYxNCA1Mi42MzcsNDcuOTY2IEM1NS42NDcsNDcuNjQ3IDU4LDQ1LjA5MyA1OCw0MiBDNTgsNDAuMTE2IDU3LjA5NCwzOC4zNjIgNTUuNjMzLDM3LjI0NSBMNTUuNjMzLDM3LjI0NSBaIE0zOCw0NSBDMzgsNDUuNTUyIDM4LjQ0Nyw0NiAzOSw0NiBDNDAuNDU4LDQ2IDQyLDQ3LjU0MiA0Miw0OSBDNDIsNDkuNTUyIDQyLjQ0Nyw1MCA0Myw1MCBDNDMuNTUzLDUwIDQ0LDQ5LjU1MiA0NCw0OSBDNDQsNDYuNDMgNDEuNTcsNDQgMzksNDQgQzM4LjQ0Nyw0NCAzOCw0NC40NDggMzgsNDUgTDM4LDQ1IFogTTQ3LDE4IEM0NS41NDIsMTggNDQsMTYuNDU4IDQ0LDE1IEM0NCwxNC40NDggNDMuNTUzLDE0IDQzLDE0IEM0Mi40NDcsMTQgNDIsMTQuNDQ4IDQyLDE1IEM0MiwxNy41NyA0NC40MywyMCA0NywyMCBDNDcuNTUzLDIwIDQ4LDE5LjU1MiA0OCwxOSBDNDgsMTguNDQ4IDQ3LjU1MywxOCA0NywxOCBMNDcsMTggWiBNMzUsNDAgQzM1LjU1Myw0MCAzNiwzOS41NTIgMzYsMzkgQzM2LDM3LjU0MiAzNy41NDIsMzYgMzksMzYgQzM5LjU1MywzNiA0MCwzNS41NTIgNDAsMzUgQzQwLDM0LjQ0OCAzOS41NTMsMzQgMzksMzQgQzM2LjQzLDM0IDM0LDM2LjQzIDM0LDM5IEMzNCwzOS41NTIgMzQuNDQ3LDQwIDM1LDQwIEwzNSw0MCBaIE0zOSwyOCBDMzkuNTUzLDI4IDQwLDI3LjU1MiA0MCwyNyBDNDAsMjYuNDQ4IDM5LjU1MywyNiAzOSwyNiBDMzcuNTQyLDI2IDM2LDI0LjQ1OCAzNiwyMyBDMzYsMjIuNDQ4IDM1LjU1MywyMiAzNSwyMiBDMzQuNDQ3LDIyIDM0LDIyLjQ0OCAzNCwyMyBDMzQsMjUuNTcgMzYuNDMsMjggMzksMjggTDM5LDI4IFogTTQ5LDI0IEM0OC40NDcsMjQgNDgsMjQuNDQ4IDQ4LDI1IEM0OCwyNi40NTggNDYuNDU4LDI4IDQ1LDI4IEM0NC40NDcsMjggNDQsMjguNDQ4IDQ0LDI5IEM0NCwyOS41NTIgNDQuNDQ3LDMwIDQ1LDMwIEM0Ny41NywzMCA1MCwyNy41NyA1MCwyNSBDNTAsMjQuNDQ4IDQ5LjU1MywyNCA0OSwyNCBMNDksMjQgWiBNNDUsMzYgQzQ0LjQ0NywzNiA0NCwzNi40NDggNDQsMzcgQzQ0LDM3LjU1MiA0NC40NDcsMzggNDUsMzggQzQ2LjQ1OCwzOCA0OCwzOS41NDIgNDgsNDEgQzQ4LDQxLjU1MiA0OC40NDcsNDIgNDksNDIgQzQ5LjU1Myw0MiA1MCw0MS41NTIgNTAsNDEgQzUwLDM4LjQzIDQ3LjU3LDM2IDQ1LDM2IEw0NSwzNiBaIE0zNCwxNCBDMzQsMTEuNDMgMzYuNDMsOSAzOSw5IEMzOS41NTMsOSA0MCw5LjQ0OCA0MCwxMCBDNDAsMTAuNTUyIDM5LjU1MywxMSAzOSwxMSBDMzcuNTQyLDExIDM2LDEyLjU0MiAzNiwxNCBDMzYsMTQuNTUyIDM1LjU1MywxNSAzNSwxNSBDMzQuNDQ3LDE1IDM0LDE0LjU1MiAzNCwxNCBMMzQsMTQgWiIgaWQ9ImFuZHJvaWQtYnJhaW4iLz48L2c+PC9nPjwvc3ZnPg==" title="brain" style="margin-bottom: -2px;">
                    --}}
                    <span class="icon is-medium"><i class="fa fa-barcode"></i></span>
                    {{ env('APP_NAME','sitename') }}
                </span>
            </a>
        </div>
        <span :class="{'is-active': isActive}" @click="toggle" id="nav-toggle" class="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
        </span>
        <div id="nav-menu" :class="{'is-active': isActive}" class="nav-menu nav-right">
            @if (Auth::guest())
                @if(env('APP_REGISTER',false))
                    <a class="nav-item @if(Route::is('login')){{'is-active'}}@endif" href="{{ url('/login') }}">
                        <span class="icon"><i class="fa fa-sign-in"></i></span>
                        <span>Login</span>
                    </a>
                    <a class="nav-item @if(Route::is('register')){{'is-active'}}@endif" href="{{ url('/register') }}">
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <span>Register</span>
                    </a>
                @endif
            @else
                <a class="nav-item @if(Route::is('profile')){{'is-active'}}@endif" href="{{ url('profile') }}" class="nav-item is-tab">
                    <span class="icon"><i class="fa fa-user"></i></span>
                    <span>{{ Auth::user()->name }}</span>
                </a>
                @can('contributor')
                    <a class="nav-item @if(Route::is('admin')){{'is-active'}}@endif" href="{{ route('admin') }}">
                        <span class="icon"><i class="fa fa-lock"></i></span>
                        <span>Admin</span>
                    </a>
                @endcan
                <a class="nav-item" href="{{ url('/logout') }}">
                    <span class="icon"><i class="fa fa-sign-out"></i></span>
                    Logout
                </a>
            @endif

            <div class="nav-item search">
                {!! Form::open(['route'=>'articles','method'=>'GET']) !!}
                <p class="control has-addons">
                    {{--                {!! Form::text('query',request('query'),['class'=>'input','placeholder'=>'Find articles','id'=>'search']) !!}--}}

                    <autocomplete
                            url="/articles/autocomplete"
                            placeholder="Find Articles"
                            anchor="title"
                            label="summary"
                            :on-select="getData"
                            id="search"
                            init-value="{{ request('query') }}"
                            class-name="input"
                            validate-name="{{ $errors->has('query')?'invalid':'validate' }}"
                            name="query"
                    >
                    </autocomplete>

                    {!! Form::submit('Search',['class'=>'button']) !!}
                    {{--<a class="button is-info">--}}
                    {{--Search--}}
                    {{--</a>--}}
                </p>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</header>