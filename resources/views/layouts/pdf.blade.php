<!DOCTYPE html>
<html lang="en" class="">
<head>
  <title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
  	<meta http-equiv="Content-Type" content="application/pdf; charset=utf-8" />
  	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <!-- 	<link rel="stylesheet" href="../../css/font.css" type="text/css" crossorigin="anonymous">
  	<link rel="stylesheet" href="../../css/app2-for-pdf.css" type="text/css" crossorigin="anonymous">
  	<link rel="stylesheet" href="../../css/font2.css" type="text/css" crossorigin="anonymous">
  	<link rel="stylesheet" href="../../css/global.css" type="text/css" crossorigin="anonymous">-->
    <link rel="stylesheet" href="/css/font2.css" type="text/css" >
<style>

</style>

<style>
/* app2-for-pdf.css */
html {
  background-color: #f0f3f4;
}

body {
  font-family: TradeGothicNextLTPro-Lt, "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  -webkit-font-smoothing: antialiased;
  line-height: 1.42857143;
  color: #58666e;
  background-color: transparent;
}

*:focus {
  outline: 0 !important;
}

.h1,
.h2,
.h3,
.h4,
.h5,
.h6 {
  margin: 0;
}

a {
  color: inherit;
  text-decoration: none;
  cursor: pointer;
}

a:hover,
a:focus {
  color: inherit;
  text-decoration: none;
}

label {
  font-weight: normal;
}

small,
.small {
  font-size: 13px;
}

.badge,
.label {
  font-weight: bold;
  text-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
}

.badge.bg-light,
.label.bg-light {
  text-shadow: none;
}

.badge {
  background-color: #cfdadd;
}

.badge.up {
  position: relative;
  top: -10px;
  padding: 3px 6px;
  margin-left: -10px;
}

.badge-sm {
  padding: 2px 5px !important;
  font-size: 85%;
}

.label-sm {
  padding-top: 0;
  padding-bottom: 1px;
}

.badge-white {
  padding: 2px 6px;
  background-color: transparent;
  border: 1px solid rgba(255, 255, 255, 0.35);
}

.badge-empty {
  color: inherit;
  background-color: transparent;
  border: 1px solid rgba(0, 0, 0, 0.15);
}

blockquote {
  border-color: #dee5e7;
}

.caret-white {
  border-top-color: #fff;
  border-top-color: rgba(255, 255, 255, 0.65);
}

a:hover .caret-white {
  border-top-color: #fff;
}

.thumbnail {
  border-color: #dee5e7;
}

.progress {
  background-color: #edf1f2;
}

.progress-xxs {
  height: 2px;
}

.progress-xs {
  height: 6px;
}

.progress-sm {
  height: 12px;
}

.progress-sm .progress-bar {
  font-size: 10px;
  line-height: 1em;
}

.progress,
.progress-bar {
  -webkit-box-shadow: none;
          box-shadow: none;
}

.progress-bar-primary {
  background-color: #7266ba;
}

.progress-bar-info {
  background-color: #23b7e5;
}

.progress-bar-success {
  background-color: #27c24c;
}

.progress-bar-warning {
  background-color: #fad733;
}

.progress-bar-danger {
  background-color: #f05050;
}

.progress-bar-black {
  background-color: #1c2b36;
}

.progress-bar-white {
  background-color: #fff;
}

.accordion-group,
.accordion-inner {
  border-color: #dee5e7;
  border-radius: 2px;
}

.alert {
  font-size: 13px;
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2);
}

.alert .close i {
  display: block;
  font-size: 12px;
  font-weight: normal;
}

.form-control {
  border-color: #cfdadd;
  border-radius: 2px;
}

.form-control,
.form-control:focus {
  -webkit-box-shadow: none;
          box-shadow: none;
}

.form-control:focus {
  border-color: #23b7e5;
}

.form-horizontal .control-label.text-left {
  text-align: left;
}

.form-control-spin {
  position: absolute;
  top: 50%;
  right: 10px;
  z-index: 2;
  margin-top: -7px;
}

.input-group-addon {
  background-color: #edf1f2;
  border-color: #cfdadd;
}

.list-group {
  border-radius: 2px;
}

.list-group.no-radius .list-group-item {
  border-radius: 0 !important;
}

.list-group.no-borders .list-group-item {
  border: none;
}

.list-group.no-border .list-group-item {
  border-width: 1px 0;
}

.list-group.no-bg .list-group-item {
  background-color: transparent;
}

.list-group-item {
  padding-right: 15px;
  border-color: #e7ecee;
}

a.list-group-item:hover,
a.list-group-item:focus,
a.list-group-item.hover {
  background-color: #f6f8f8;
}

.list-group-item.media {
  margin-top: 0;
}

.list-group-item.active {
  color: #fff;
  background-color: #23b7e5 !important;
  border-color: #23b7e5 !important;
}

.list-group-item.active .text-muted {
  color: #ace4f5 !important;
}

.list-group-item.active a {
  color: #fff;
}

.list-group-item.focus {
  background-color: #e4eaec !important;
}

.list-group-item.select {
  position: relative;
  z-index: 1;
  background-color: #dbeef9 !important;
  border-color: #c5e4f5;
}

.list-group-alt .list-group-item:nth-child(2n+2) {
  background-color: rgba(0, 0, 0, 0.02) !important;
}

.list-group-lg .list-group-item {
  padding-top: 15px;
  padding-bottom: 15px;
}

.list-group-sm .list-group-item {
  padding: 6px 10px;
}

.list-group-sp .list-group-item {
  margin-bottom: 5px;
  border-radius: 3px;
}

.list-group-item > .badge {
  margin-right: 0;
}

.list-group-item > .fa-chevron-right {
  float: right;
  margin-top: 4px;
  margin-right: -5px;
}

.list-group-item > .fa-chevron-right + .badge {
  margin-right: 5px;
}

.nav-pills.no-radius > li > a {
  border-radius: 0;
}

.nav-pills > li.active > a {
  color: #fff !important;
  background-color: #23b7e5;
}

.nav-pills > li.active > a:hover,
.nav-pills > li.active > a:active {
  background-color: #19a9d5;
}

.nav > li > a:hover,
.nav > li > a:focus {
  background-color: rgba(0, 0, 0, 0.05);
}

.nav.nav-lg > li > a {
  padding: 20px 20px;
}

.nav.nav-md > li > a {
  padding: 15px 15px;
}

.nav.nav-sm > li > a {
  padding: 6px 12px;
}

.nav.nav-xs > li > a {
  padding: 4px 10px;
}

.nav.nav-xxs > li > a {
  padding: 1px 10px;
}

.nav.nav-rounded > li > a {
  border-radius: 20px;
}

.nav .open > a,
.nav .open > a:hover,
.nav .open > a:focus {
  background-color: rgba(0, 0, 0, 0.05);
}

.nav-tabs {
  border-color: #dee5e7;
}

.nav-tabs > li > a {
  border-bottom-color: #dee5e7;
  border-radius: 2px 2px 0 0;
}

.nav-tabs > li:hover > a,
.nav-tabs > li.active > a,
.nav-tabs > li.active > a:hover {
  border-color: #dee5e7;
}

.nav-tabs > li.active > a {
  border-bottom-color: #fff !important;
}

.nav-tabs-alt .nav-tabs.nav-justified > li {
  display: table-cell;
  width: 1%;
}

.nav-tabs-alt .nav-tabs > li > a {
  background: transparent !important;
  border-color: transparent !important;
  border-bottom-color: #dee5e7 !important;
  border-radius: 0;
}

.nav-tabs-alt .nav-tabs > li.active > a {
  border-bottom-color: #23b7e5 !important;
}

.tab-container {
  margin-bottom: 15px;
}

.tab-container .tab-content {
  padding: 15px;
  background-color: #fff;
  border: 1px solid #dee5e7;
  border-top-width: 0;
  border-radius: 0 0 2px 2px;
}

.pagination > li > a {
  border-color: #dee5e7;
}

.pagination > li > a:hover,
.pagination > li > a:focus {
  background-color: #edf1f2;
  border-color: #dee5e7;
}

.panel {
  border-radius: 2px;
}

.panel .accordion-toggle {
  display: block;
  font-size: 14px;
  cursor: pointer;
}

.panel .list-group-item {
  border-color: #edf1f2;
}

.panel.no-borders {
  border-width: 0;
}

.panel.no-borders .panel-heading,
.panel.no-borders .panel-footer {
  border-width: 0;
}

.panel-heading {
  border-radius: 2px 2px 0 0;
}

.panel-default .panel-heading {
  background-color: #f6f8f8;
}

.panel-heading.no-border {
  margin: -1px -1px 0 -1px;
  border: none;
}

.panel-heading .nav {
  margin: -10px -15px;
}

.panel-heading .list-group {
  background: transparent;
}

.panel-footer {
  background-color: #ffffff;
  border-color: #edf1f2;
  border-radius: 0 0 2px 2px;
}

.panel-default {
  border-color: #dee5e7;
}

.panel-default > .panel-heading,
.panel-default > .panel-footer {
  border-color: #edf1f2;
}

.panel-group .panel-heading + .panel-collapse .panel-body {
  border-top: 1px solid #eaedef;
}

.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > tbody > tr > td,
.table > tfoot > tr > td {
  padding: 8px 15px;
  border-top: 1px solid #eaeff0;
}

.table > thead > tr > th {
  padding: 8px 15px;
  border-bottom: 1px solid #eaeff0;
}

.table-bordered {
  border-color: #eaeff0;
}

.table-bordered > tbody > tr > td {
  border-color: #eaeff0;
}

.table-bordered > thead > tr > th {
  border-color: #eaeff0;
}

.table-striped > tbody > tr:nth-child(odd) > td,
.table-striped > tbody > tr:nth-child(odd) > th {
  background-color: #fafbfc;
}

.table-striped > thead > th {
  background-color: #fafbfc;
  border-right: 1px solid #eaeff0;
}

.table-striped > thead > th:last-child {
  border-right: none;
}

.well,
pre {
  background-color: #edf1f2;
  border-color: #dee5e7;
}

.dropdown-menu {
  border: 1px solid #dee5e7;
  border: 1px solid rgba(0, 0, 0, 0.1);
  border-radius: 2px;
  -webkit-box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
          box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.dropdown-menu.pull-left {
  left: 100%;
}

.dropdown-menu > .panel {
  margin: -5px 0;
  border: none;
}

.dropdown-menu > li > a {
  padding: 5px 15px;
}

.dropdown-menu > li > a:hover,
.dropdown-menu > li > a:focus,
.dropdown-menu > .active > a,
.dropdown-menu > .active > a:hover,
.dropdown-menu > .active > a:focus {
  color: #58666e;
  background-color: #edf1f2 !important;
  background-image: none;
  filter: none;
}

.dropdown-header {
  padding: 5px 15px;
}

.dropdown-submenu {
  position: relative;
}

.dropdown-submenu:hover > a,
.dropdown-submenu:focus > a {
  color: #58666e;
  background-color: #edf1f2 !important;
}

.dropdown-submenu:hover > .dropdown-menu,
.dropdown-submenu:focus > .dropdown-menu {
  display: block;
}

.dropdown-submenu.pull-left {
  float: none !important;
}

.dropdown-submenu.pull-left > .dropdown-menu {
  left: -100%;
  margin-left: 10px;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -6px;
  margin-left: -1px;
}

.dropup .dropdown-submenu > .dropdown-menu {
  top: auto;
  bottom: 0;
}

.btn-group > .btn {
  margin-left: -1px;
}

/*cols*/

.col-lg-2-4 {
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}

.col-0 {
  clear: left;
}

.row.no-gutter {
  margin-right: 0;
  margin-left: 0;
}

.no-gutter [class*="col"] {
  padding: 0;
}

.row-sm {
  margin-right: -10px;
  margin-left: -10px;
}

.row-sm > div {
  padding-right: 10px;
  padding-left: 10px;
}

.modal-backdrop {
  background-color: #3a3f51;
}

.modal-backdrop.in {
  opacity: 0.8;
  filter: alpha(opacity=80);
}

.modal-over {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}

.modal-center {
  position: absolute;
  top: 50%;
  left: 50%;
}

/*layout*/

html,
body {
  width: 100%;
  height: 100%;
}

body {
  overflow-x: hidden;
}

.app {
  position: relative;
  width: 100%;
  height: auto;
  min-height: 100%;
}

.app:before {
  position: absolute;
  top: 0;
  bottom: 0;
  z-index: -1;
  display: block;
  width: inherit;
  background-color: #f0f3f4;
  border: inherit;
  content: "";
}

.app-header-fixed {
  padding-top: 50px;
}

.app-header-fixed .app-header {
  position: fixed;
  top: 0;
  width: 100%;
}

.app-header {
  z-index: 1025;
  border-radius: 0;
}

.app-aside {
  float: left;
}

.app-aside:before {
  position: absolute;
  top: 0;
  bottom: 0;
  z-index: -1;
  width: inherit;
  background-color: inherit;
  border: inherit;
  content: "";
}

.app-aside-footer {
  position: absolute;
  bottom: 0;
  z-index: 1000;
  width: 100%;
  max-width: 200px;
}

.app-aside-folded .app-aside-footer {
  max-width: 60px;
}

.app-aside-footer ~ div {
  padding-bottom: 50px;
}

.app-aside-right {
  padding-bottom: 50px;
}

.app-content {
  height: 100%;
}

.app-content:before,
.app-content:after {
  display: table;
  content: " ";
}

.app-content:after {
  clear: both;
}

.app-content-full {
  position: absolute;
  top: 50px;
  bottom: 50px;
  width: auto !important;
  height: auto;
  padding: 0 !important;
  overflow-y: auto;
  -webkit-overflow-scrolling: touch;
}

.app-content-full.h-full {
  bottom: 0;
  height: auto;
}

.app-content-body {
  float: left;
  width: 100%;
  padding-bottom: 50px;
}

.app-footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1005;
}

.app-footer.app-footer-fixed {
  position: fixed;
}

.hbox {
  display: table;
  width: 100%;
  height: 100%;
  border-spacing: 0;
  table-layout: fixed;
}

.hbox .col {
  display: table-cell;
  float: none;
  height: 100%;
  vertical-align: top;
}

.v-middle {
  vertical-align: middle !important;
}

.v-top {
  vertical-align: top !important;
}

.v-bottom {
  vertical-align: bottom !important;
}

.vbox {
  position: relative;
  display: table;
  width: 100%;
  height: 100%;
  min-height: 240px;
  border-spacing: 0;
}

.vbox .row-row {
  display: table-row;
  height: 100%;
}

.vbox .row-row .cell {
  position: relative;
  width: 100%;
  height: 100%;
}

.ie .vbox .row-row .cell {
  display: table-cell;
  overflow: auto;
}

.ie .vbox .row-row .cell .cell-inner {
  overflow: visible !important;
}

.vbox .row-row .cell .cell-inner {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  overflow: auto;
  -webkit-overflow-scrolling: touch;
}

.navbar {
  margin: 0;
  border-width: 0;
  border-radius: 0;
}

.navbar .navbar-form-sm {
  margin-top: 10px;
  margin-bottom: 10px;
}

.navbar-md {
  min-height: 60px;
}

.navbar-md .navbar-btn {
  margin-top: 13px;
}

.navbar-md .navbar-form {
  margin-top: 15px;
}

.navbar-md .navbar-nav > li > a {
  padding-top: 20px;
  padding-bottom: 20px;
}

.navbar-md .navbar-brand {
  line-height: 60px;
}

.navbar-header > button {
  padding: 10px 17px;
  font-size: 16px;
  line-height: 30px;
  text-decoration: none;
  background-color: transparent;
  border: none;
}

.navbar-brand {
  display: inline-block;
  float: none !important;
  height: auto;
  padding: 0 20px;
  font-size: 20px;
  font-weight: 700;
  line-height: 50px;
  text-align: center;
}

.navbar-brand:hover {
  text-decoration: none;
}

.navbar-brand img {
  display: inline;
  max-height: 20px;
  margin-top: -4px;
  vertical-align: middle;
}

@media (min-width: 768px) {
  .app-aside,
  .navbar-header {
    width: 200px;
  }
  .navbar-collapse,
  .app-content,
  .app-footer {
    margin-left: 200px;
  }
  .app-aside-right {
    position: absolute;
    top: 50px;
    right: 0;
    bottom: 0;
    z-index: 1000;
  }
  .app-aside-right.pos-fix {
    z-index: 1010;
  }
  .visible-folded {
    display: none;
  }
  .app-aside-folded .hidden-folded {
    display: none !important;
  }
  .app-aside-folded .visible-folded {
    display: inherit;
  }
  .app-aside-folded .text-center-folded {
    text-align: center;
  }
  .app-aside-folded .pull-none-folded {
    float: none !important;
  }
  .app-aside-folded .w-auto-folded {
    width: auto;
  }
  .app-aside-folded .app-aside,
  .app-aside-folded .navbar-header {
    width: 60px;
  }
  .app-aside-folded .navbar-collapse,
  .app-aside-folded .app-content,
  .app-aside-folded .app-footer {
    margin-left: 60px;
  }
  .app-aside-folded .app-header .navbar-brand {
    display: block;
    padding: 0;
  }
  .app-aside-fixed .app-aside:before {
    position: fixed;
  }
  .app-aside-fixed .app-header .navbar-header {
    position: fixed;
  }
  .app-aside-fixed .aside-wrap {
    position: fixed;
    top: 50px;
    bottom: 0;
    left: 0;
    z-index: 1000;
    width: 199px;
    overflow: hidden;
  }
  .app-aside-fixed .aside-wrap .navi-wrap {
    position: relative;
    width: 217px;
    height: 100%;
    overflow-x: hidden;
    overflow-y: scroll;
    -webkit-overflow-scrolling: touch;
  }
  .app-aside-fixed .aside-wrap .navi-wrap::-webkit-scrollbar {
    -webkit-appearance: none;
  }
  .app-aside-fixed .aside-wrap .navi-wrap::-webkit-scrollbar:vertical {
    width: 17px;
  }
  .app-aside-fixed .aside-wrap .navi-wrap > * {
    width: 200px;
  }
  .smart .app-aside-fixed .aside-wrap .navi-wrap {
    width: 200px;
  }
  .app-aside-fixed.app-aside-folded .app-aside {
    position: fixed;
    top: 0;
    bottom: 0;
    z-index: 1010;
  }
  .app-aside-fixed.app-aside-folded .aside-wrap {
    width: 59px;
  }
  .app-aside-fixed.app-aside-folded .aside-wrap .navi-wrap {
    width: 77px;
  }
  .app-aside-fixed.app-aside-folded .aside-wrap .navi-wrap > * {
    width: 60px;
  }
  .smart .app-aside-fixed.app-aside-folded .aside-wrap .navi-wrap {
    width: 60px;
  }
  .bg-auto:before {
    position: absolute;
    top: 0;
    bottom: 0;
    z-index: -1;
    width: inherit;
    background-color: inherit;
    border: inherit;
    content: "";
  }
  .bg-auto.b-l:before {
    margin-left: -1px;
  }
  .bg-auto.b-r:before {
    margin-right: -1px;
  }
  .col.show {
    display: table-cell !important;
  }
}
/* *************************************************** */

@media (min-width: 768px) and (max-width: 991px) {
  .hbox-auto-sm {
    display: block;
  }
  .hbox-auto-sm > .col {
    display: block;
    width: auto;
    height: auto;
  }
  .hbox-auto-sm > .col.show {
    display: block !important;
  }
  .hbox-auto-sm .vbox {
    height: auto;
  }
  .hbox-auto-sm .cell-inner {
    position: static !important;
  }
}

@media (max-width: 767px) {
  body {
    height: auto;
    min-height: 100%;
  }
  .navbar-fixed-bottom {
    position: fixed;
  }
  .app-aside {
    float: none;
  }
  .app-content-full {
    position: relative;
    top: 0;
    width: 100% !important;
  }
  .hbox-auto-xs {
    display: block;
  }
  .hbox-auto-xs > .col {
    display: block;
    width: auto;
    height: auto;
  }
  .hbox-auto-xs .vbox {
    height: auto;
  }
  .hbox-auto-xs .cell-inner {
    position: static !important;
  }
  .navbar-nav {
    margin-top: 0;
    margin-bottom: 0;
  }
  .navbar-nav > li > a {
    box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.1);
  }
  .navbar-nav > li > a .up {
    top: 0;
  }
  .navbar-nav > li > a .avatar {
    width: 30px;
    margin-top: -5px;
  }
  .navbar-nav .open .dropdown-menu {
    background-color: #fff;
  }
  .navbar-form {
    margin-top: 0 !important;
    margin-bottom: 0 !important;
    box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.1);
  }
  .navbar-form .form-group {
    margin-bottom: 0;
  }
}

html.bg {
  background: url('../img/bg.jpg');
  background-attachment: fixed;
  background-size: cover;
}

.app.container {
  padding-right: 0;
  padding-left: 0;
}

@media (min-width: 768px) {
  .app.container {
    width: 750px;
    -webkit-box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
  }
  .app.container .app-aside {
    overflow-x: hidden;
  }
  .app.container.app-aside-folded .app-aside {
    overflow-x: visible;
  }
  .app.container.app-aside-fixed .aside-wrap {
    left: inherit;
  }
  .app.container.app-aside-fixed.app-aside-folded .app-aside > ul.nav {
    position: absolute;
  }
  .app.container .app-header,
  .app.container .app-aside {
    max-width: 750px;
  }
  .app.container .app-footer-fixed {
    right: auto;
    left: auto;
    width: 100%;
    max-width: 550px;
  }
  .app.container.app-aside-folded .app-footer-fixed {
    max-width: 690px;
  }
  .app.container.app-aside-dock .app-footer-fixed {
    max-width: 750px;
  }
}

@media (min-width: 992px) {
  .app.container {
    width: 970px;
  }
  .app.container .app-header,
  .app.container .app-aside {
    max-width: 970px;
  }
  .app.container .app-footer-fixed {
    max-width: 770px;
  }
  .app.container.app-aside-folded .app-footer-fixed {
    max-width: 910px;
  }
  .app.container.app-aside-dock .app-footer-fixed {
    max-width: 970px;
  }
}

@media (min-width: 1200px) {
  .app.container {
    width: 1170px;
  }
  .app.container .app-header,
  .app.container .app-aside {
    max-width: 1170px;
  }
  .app.container .app-footer-fixed {
    max-width: 970px;
  }
  .app.container.app-aside-folded .app-footer-fixed {
    max-width: 1110px;
  }
  .app.container.app-aside-dock .app-footer-fixed {
    max-width: 1170px;
  }
}

.nav-sub {
  height: 0;
  margin-left: -20px;
  overflow: hidden;
  opacity: 0;
  -webkit-transition: all 0.2s ease-in-out 0s;
          transition: all 0.2s ease-in-out 0s;
}

.active > .nav-sub,
.app-aside-folded li:hover > .nav-sub,
.app-aside-folded li:focus > .nav-sub,
.app-aside-folded li:active > .nav-sub {
  height: auto !important;
  margin-left: 0;
  overflow: auto;
  opacity: 1;
}

.nav-sub-header {
  display: none !important;
}

.nav-sub-header a {
  padding: 15px 20px;
}

.navi ul.nav li {
  position: relative;
  display: block;
}

.navi ul.nav li li a {
  padding-left: 55px;
}

.navi ul.nav li li ul {
  display: none;
}

.navi ul.nav li li.active > ul {
  display: block;
}

.navi ul.nav li a {
  position: relative;
  display: block;
  padding: 10px 20px;
  font-weight: normal;
  text-transform: none;
  -webkit-transition: background-color 0.2s ease-in-out 0s;
          transition: background-color 0.2s ease-in-out 0s;
}

.navi ul.nav li a .badge,
.navi ul.nav li a .label {
  padding: 2px 5px;
  margin-top: 2px;
  font-size: 11px;
}

.navi ul.nav li a > i {
  position: relative;
  float: left;
  width: 40px;
  margin: -10px -10px;
  margin-right: 5px;
  overflow: hidden;
  line-height: 40px;
  text-align: center;
}

.navi ul.nav li a > i:before {
  position: relative;
  z-index: 2;
}

@media (min-width: 768px) {
  .app-aside-folded .nav-sub-header {
    display: block !important;
  }
  .app-aside-folded .nav-sub-header a {
    padding: 15px 20px !important;
  }
  .app-aside-folded .navi > ul > li > a {
    position: relative;
    height: 50px;
    padding: 0;
    text-align: center;
    border: none;
  }
  .app-aside-folded .navi > ul > li > a span {
    display: none;
  }
  .app-aside-folded .navi > ul > li > a span.pull-right {
    display: none !important;
  }
  .app-aside-folded .navi > ul > li > a i {
    display: block;
    float: none !important;
    width: auto;
    margin: 0;
    font-size: 16px;
    line-height: 50px;
    border: none !important;
  }
  .app-aside-folded .navi > ul > li > a i b {
    left: 0 !important;
  }
  .app-aside-folded .navi > ul > li > a .badge,
  .app-aside-folded .navi > ul > li > a .label {
    position: absolute;
    top: 8px;
    right: 12px;
    z-index: 3;
  }
  .app-aside-folded .navi > ul > li > ul {
    position: absolute;
    top: 0 !important;
    left: 100%;
    z-index: 1050;
    width: 200px;
    height: 0 !important;
    -webkit-box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
  }
  .app-aside-folded .navi li li a {
    padding-left: 20px !important;
  }
  .app-aside-folded.app-aside-fixed .app-aside > ul.nav {
    position: fixed;
    left: 80px;
    z-index: 1010;
    display: block;
    width: 260px;
    height: auto;
    overflow: visible;
    overflow-y: auto;
    opacity: 1;
    -webkit-overflow-scrolling: touch;
  }
  .app-aside-folded.app-aside-fixed .app-aside > ul.nav:before {
    position: absolute;
    top: 0;
    left: -60px;
    width: 60px;
    height: 50px;
    content: "";
  }
  .app-aside-folded.app-aside-fixed .app-aside > ul.nav a {
    padding-right: 20px !important;
    padding-left: 20px !important;
  }
}

@media (max-width: 767px) {
  html,
  body {
    
  }
  .app {
    overflow-x: hidden;
  }
  .app-content {
    -webkit-transition: -webkit-transform 0.2s ease;
       -moz-transition: -moz-transform 0.2s ease;
         -o-transition: -o-transform 0.2s ease;
            transition: transform 0.2s ease;
  }
  .off-screen {
    position: fixed;
    top: 50px;
    bottom: 0;
    z-index: 1010;
    display: block !important;
    width: 75%;
    overflow-x: hidden;
    overflow-y: auto;
    visibility: visible;
    -webkit-overflow-scrolling: touch;
  }
  .off-screen + * {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1015;
    width: 100%;
    padding-top: 50px;
    overflow: hidden;
    background-color: #f0f3f4;
    -webkit-transform: translate3d(75%, 0, 0px);
            transform: translate3d(75%, 0, 0px);
    -webkit-transition: -webkit-transform 0.2s ease;
       -moz-transition: -moz-transform 0.2s ease;
         -o-transition: -o-transform 0.2s ease;
            transition: transform 0.2s ease;
    -webkit-backface-visibility: hidden;
       -moz-backface-visibility: hidden;
            backface-visibility: hidden;
  }
  .off-screen + * .off-screen-toggle {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1020;
    display: block !important;
  }
  .off-screen.pull-right {
    right: 0;
  }
  .off-screen.pull-right + * {
    -webkit-transform: translate3d(-75%, 0, 0px);
            transform: translate3d(-75%, 0, 0px);
  }
}
/* *************************************************** */

@media (min-width: 992px) {
  .app-aside-dock .app-content,
  .app-aside-dock .app-footer {
    margin-right: 0 !important;
    margin-left: 0 !important;
  }
  .app-aside-dock .app-aside-footer ~ div {
    padding-bottom: 0;
  }
  .app-aside-dock.app-aside-fixed.app-header-fixed {
    padding-top: 115px;
  }
  .app-aside-dock.app-aside-fixed .app-aside {
    position: fixed;
    top: 50px;
    z-index: 1000;
    width: 100%;
  }
  .app-aside-dock .app-aside,
  .app-aside-dock .aside-wrap,
  .app-aside-dock .navi-wrap {
    position: relative;
    top: 0;
    float: none;
    width: 100% !important;
    overflow: visible !important;
  }
  .app-aside-dock .navi-wrap > * {
    width: auto !important;
  }
  .app-aside-dock .app-aside {
    bottom: auto !important;
  }
  .app-aside-dock .app-aside.b-r {
    border-bottom: 1px solid #dee5e7;
    border-right-width: 0;
  }
  .app-aside-dock .app-aside:before {
    display: none;
  }
  .app-aside-dock .app-aside nav > .nav {
    float: left;
  }
  .app-aside-dock .app-aside .hidden-folded,
  .app-aside-dock .app-aside .line,
  .app-aside-dock .app-aside .navi-wrap > div {
    display: none !important;
  }
  .app-aside-dock .app-aside .navi > ul > li {
    position: relative;
    display: inline-block;
    float: left;
  }
  .app-aside-dock .app-aside .navi > ul > li > a {
    height: auto;
    padding: 10px 15px 12px 15px;
    text-align: center;
  }
  .app-aside-dock .app-aside .navi > ul > li > a > .badge,
  .app-aside-dock .app-aside .navi > ul > li > a > .label {
    position: absolute;
    top: 5px;
    right: 8px;
    padding: 1px 4px;
  }
  .app-aside-dock .app-aside .navi > ul > li > a > i {
    display: block;
    float: none;
    width: 40px;
    margin-top: -10px;
    margin-right: auto;
    margin-bottom: -7px;
    margin-left: auto;
    font-size: 14px;
    line-height: 40px;
  }
  .app-aside-dock .app-aside .navi > ul > li > a > span.pull-right {
    position: absolute;
    bottom: 2px;
    left: 50%;
    display: block !important;
    margin-left: -6px;
    line-height: 1;
  }
  .app-aside-dock .app-aside .navi > ul > li > a > span.pull-right i {
    width: 12px;
    font-size: 12px;
    line-height: 12px;
  }
  .app-aside-dock .app-aside .navi > ul > li > a > span.pull-right i.text {
    line-height: 14px;
    -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
            transform: rotate(90deg);
  }
  .app-aside-dock .app-aside .navi > ul > li > a > span {
    display: block;
    font-weight: normal;
  }
  .app-aside-dock .app-aside .navi > ul > li .nav-sub {
    position: absolute;
    top: auto !important;
    left: 0;
    z-index: 1050;
    display: none;
    width: 200px;
    height: auto !important;
    -webkit-box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
  }
  .app-aside-dock .app-aside .navi > ul > li .nav-sub-header {
    display: none !important;
  }
  .app-aside-dock .app-aside .navi li li a {
    padding-left: 15px;
  }
  .app-aside-dock .app-aside .navi li:hover > .nav-sub,
  .app-aside-dock .app-aside .navi li:focus > .nav-sub,
  .app-aside-dock .app-aside .navi li:active > .nav-sub {
    display: block;
    height: auto !important;
    margin-left: 0;
    overflow: auto;
    opacity: 1;
  }
}

.arrow {
  z-index: 10;
  border-width: 9px;
}

.arrow,
.arrow:after {
  position: absolute;
  display: block;
  width: 0;
  height: 0;
  border-color: transparent;
  border-style: solid;
}

.arrow:after {
  border-width: 8px;
  content: "";
}

.arrow.top {
  top: -9px;
  left: 50%;
  margin-left: -9px;
  border-bottom-color: rgba(0, 0, 0, 0.1);
  border-top-width: 0;
}

.arrow.top:after {
  top: 1px;
  margin-left: -8px;
  border-bottom-color: #ffffff;
  border-top-width: 0;
}

.arrow.top.arrow-primary:after {
  border-bottom-color: #7266ba;
}

.arrow.top.arrow-info:after {
  border-bottom-color: #23b7e5;
}

.arrow.top.arrow-success:after {
  border-bottom-color: #27c24c;
}

.arrow.top.arrow-danger:after {
  border-bottom-color: #f05050;
}

.arrow.top.arrow-warning:after {
  border-bottom-color: #fad733;
}

.arrow.top.arrow-light:after {
  border-bottom-color: #edf1f2;
}

.arrow.top.arrow-dark:after {
  border-bottom-color: #3a3f51;
}

.arrow.top.arrow-black:after {
  border-bottom-color: #1c2b36;
}

.arrow.right {
  top: 50%;
  right: -9px;
  margin-top: -9px;
  border-left-color: rgba(0, 0, 0, 0.1);
  border-right-width: 0;
}

.arrow.right:after {
  right: 1px;
  bottom: -8px;
  border-left-color: #ffffff;
  border-right-width: 0;
}

.arrow.right.arrow-primary:after {
  border-left-color: #7266ba;
}

.arrow.right.arrow-info:after {
  border-left-color: #23b7e5;
}

.arrow.right.arrow-success:after {
  border-left-color: #27c24c;
}

.arrow.right.arrow-danger:after {
  border-left-color: #f05050;
}

.arrow.right.arrow-warning:after {
  border-left-color: #fad733;
}

.arrow.right.arrow-light:after {
  border-left-color: #edf1f2;
}

.arrow.right.arrow-dark:after {
  border-left-color: #3a3f51;
}

.arrow.right.arrow-black:after {
  border-left-color: #1c2b36;
}

.arrow.bottom {
  bottom: -9px;
  left: 50%;
  margin-left: -9px;
  border-top-color: rgba(0, 0, 0, 0.1);
  border-bottom-width: 0;
}

.arrow.bottom:after {
  bottom: 1px;
  margin-left: -8px;
  border-top-color: #ffffff;
  border-bottom-width: 0;
}

.arrow.bottom.arrow-primary:after {
  border-top-color: #7266ba;
}

.arrow.bottom.arrow-info:after {
  border-top-color: #23b7e5;
}

.arrow.bottom.arrow-success:after {
  border-top-color: #27c24c;
}

.arrow.bottom.arrow-danger:after {
  border-top-color: #f05050;
}

.arrow.bottom.arrow-warning:after {
  border-top-color: #fad733;
}

.arrow.bottom.arrow-light:after {
  border-top-color: #edf1f2;
}

.arrow.bottom.arrow-dark:after {
  border-top-color: #3a3f51;
}

.arrow.bottom.arrow-black:after {
  border-top-color: #1c2b36;
}

.arrow.left {
  top: 50%;
  left: -9px;
  margin-top: -9px;
  border-right-color: rgba(0, 0, 0, 0.1);
  border-left-width: 0;
}

.arrow.left:after {
  bottom: -8px;
  left: 1px;
  border-right-color: #ffffff;
  border-left-width: 0;
}

.arrow.left.arrow-primary:after {
  border-right-color: #7266ba;
}

.arrow.left.arrow-info:after {
  border-right-color: #23b7e5;
}

.arrow.left.arrow-success:after {
  border-right-color: #27c24c;
}

.arrow.left.arrow-danger:after {
  border-right-color: #f05050;
}

.arrow.left.arrow-warning:after {
  border-right-color: #fad733;
}

.arrow.left.arrow-light:after {
  border-right-color: #edf1f2;
}

.arrow.left.arrow-dark:after {
  border-right-color: #3a3f51;
}

.arrow.left.arrow-black:after {
  border-right-color: #1c2b36;
}

.arrow.pull-left {
  left: 19px;
}

.arrow.pull-right {
  right: 19px;
  left: auto;
}

.arrow.pull-up {
  top: 19px;
}

.arrow.pull-down {
  top: auto;
  bottom: 19px;
}

.btn {
  font-weight: 500;
  border-radius: 2px;
  outline: 0!important;
}

.btn-link {
  color: #58666e;
}

.btn-link.active {
  box-shadow: none;
  webkit-box-shadow: none;
}

.btn-default {
  color: #58666e !important;
  background-color: #fcfdfd;
  background-color: #fff;
  border-color: #dee5e7;
  border-bottom-color: #d8e1e3;
  -webkit-box-shadow: 0 1px 1px rgba(90, 90, 90, 0.1);
          box-shadow: 0 1px 1px rgba(90, 90, 90, 0.1);
}

.btn-default:hover,
.btn-default:focus,
.btn-default:active,
.btn-default.active,
.open .dropdown-toggle.btn-default {
  color: #58666e !important;
  background-color: #edf1f2;
  border-color: #c7d3d6;
}

.btn-default:active,
.btn-default.active,
.open .dropdown-toggle.btn-default {
  background-image: none;
}

.btn-default.disabled,
.btn-default[disabled],
fieldset[disabled] .btn-default,
.btn-default.disabled:hover,
.btn-default[disabled]:hover,
fieldset[disabled] .btn-default:hover,
.btn-default.disabled:focus,
.btn-default[disabled]:focus,
fieldset[disabled] .btn-default:focus,
.btn-default.disabled:active,
.btn-default[disabled]:active,
fieldset[disabled] .btn-default:active,
.btn-default.disabled.active,
.btn-default[disabled].active,
fieldset[disabled] .btn-default.active {
  background-color: #fcfdfd;
  border-color: #dee5e7;
}

.btn-default.btn-bg {
  border-color: rgba(0, 0, 0, 0.1);
  background-clip: padding-box;
}

.btn-primary {
  color: #ffffff !important;
  background-color: #7266ba;
  border-color: #7266ba;
}

.btn-primary:hover,
.btn-primary:focus,
.btn-primary:active,
.btn-primary.active,
.open .dropdown-toggle.btn-primary {
  color: #ffffff !important;
  background-color: #6254b2;
  border-color: #5a4daa;
}

.btn-primary:active,
.btn-primary.active,
.open .dropdown-toggle.btn-primary {
  background-image: none;
}

.btn-primary.disabled,
.btn-primary[disabled],
fieldset[disabled] .btn-primary,
.btn-primary.disabled:hover,
.btn-primary[disabled]:hover,
fieldset[disabled] .btn-primary:hover,
.btn-primary.disabled:focus,
.btn-primary[disabled]:focus,
fieldset[disabled] .btn-primary:focus,
.btn-primary.disabled:active,
.btn-primary[disabled]:active,
fieldset[disabled] .btn-primary:active,
.btn-primary.disabled.active,
.btn-primary[disabled].active,
fieldset[disabled] .btn-primary.active {
  background-color: #7266ba;
  border-color: #7266ba;
}

.btn-success {
  color: #ffffff !important;
  background-color: #27c24c;
  border-color: #27c24c;
}

.btn-success:hover,
.btn-success:focus,
.btn-success:active,
.btn-success.active,
.open .dropdown-toggle.btn-success {
  color: #ffffff !important;
  background-color: #23ad44;
  border-color: #20a03f;
}

.btn-success:active,
.btn-success.active,
.open .dropdown-toggle.btn-success {
  background-image: none;
}

.btn-success.disabled,
.btn-success[disabled],
fieldset[disabled] .btn-success,
.btn-success.disabled:hover,
.btn-success[disabled]:hover,
fieldset[disabled] .btn-success:hover,
.btn-success.disabled:focus,
.btn-success[disabled]:focus,
fieldset[disabled] .btn-success:focus,
.btn-success.disabled:active,
.btn-success[disabled]:active,
fieldset[disabled] .btn-success:active,
.btn-success.disabled.active,
.btn-success[disabled].active,
fieldset[disabled] .btn-success.active {
  background-color: #27c24c;
  border-color: #27c24c;
}

.btn-info {
  color: #ffffff !important;
  background-color: #23b7e5;
  border-color: #23b7e5;
}

.btn-info:hover,
.btn-info:focus,
.btn-info:active,
.btn-info.active,
.open .dropdown-toggle.btn-info {
  color: #ffffff !important;
  background-color: #19a9d5;
  border-color: #189ec8;
}

.btn-info:active,
.btn-info.active,
.open .dropdown-toggle.btn-info {
  background-image: none;
}

.btn-info.disabled,
.btn-info[disabled],
fieldset[disabled] .btn-info,
.btn-info.disabled:hover,
.btn-info[disabled]:hover,
fieldset[disabled] .btn-info:hover,
.btn-info.disabled:focus,
.btn-info[disabled]:focus,
fieldset[disabled] .btn-info:focus,
.btn-info.disabled:active,
.btn-info[disabled]:active,
fieldset[disabled] .btn-info:active,
.btn-info.disabled.active,
.btn-info[disabled].active,
fieldset[disabled] .btn-info.active {
  background-color: #23b7e5;
  border-color: #23b7e5;
}

.btn-warning {
  color: #ffffff !important;
  background-color: #fad733;
  border-color: #fad733;
}

.btn-warning:hover,
.btn-warning:focus,
.btn-warning:active,
.btn-warning.active,
.open .dropdown-toggle.btn-warning {
  color: #ffffff !important;
  background-color: #f9d21a;
  border-color: #f9cf0b;
}

.btn-warning:active,
.btn-warning.active,
.open .dropdown-toggle.btn-warning {
  background-image: none;
}

.btn-warning.disabled,
.btn-warning[disabled],
fieldset[disabled] .btn-warning,
.btn-warning.disabled:hover,
.btn-warning[disabled]:hover,
fieldset[disabled] .btn-warning:hover,
.btn-warning.disabled:focus,
.btn-warning[disabled]:focus,
fieldset[disabled] .btn-warning:focus,
.btn-warning.disabled:active,
.btn-warning[disabled]:active,
fieldset[disabled] .btn-warning:active,
.btn-warning.disabled.active,
.btn-warning[disabled].active,
fieldset[disabled] .btn-warning.active {
  background-color: #fad733;
  border-color: #fad733;
}

.btn-danger {
  color: #ffffff !important;
  background-color: #f05050;
  border-color: #f05050;
}

.btn-danger:hover,
.btn-danger:focus,
.btn-danger:active,
.btn-danger.active,
.open .dropdown-toggle.btn-danger {
  color: #ffffff !important;
  background-color: #ee3939;
  border-color: #ed2a2a;
}

.btn-danger:active,
.btn-danger.active,
.open .dropdown-toggle.btn-danger {
  background-image: none;
}

.btn-danger.disabled,
.btn-danger[disabled],
fieldset[disabled] .btn-danger,
.btn-danger.disabled:hover,
.btn-danger[disabled]:hover,
fieldset[disabled] .btn-danger:hover,
.btn-danger.disabled:focus,
.btn-danger[disabled]:focus,
fieldset[disabled] .btn-danger:focus,
.btn-danger.disabled:active,
.btn-danger[disabled]:active,
fieldset[disabled] .btn-danger:active,
.btn-danger.disabled.active,
.btn-danger[disabled].active,
fieldset[disabled] .btn-danger.active {
  background-color: #f05050;
  border-color: #f05050;
}

.btn-dark {
  color: #ffffff !important;
  background-color: #3a3f51;
  border-color: #3a3f51;
}

.btn-dark:hover,
.btn-dark:focus,
.btn-dark:active,
.btn-dark.active,
.open .dropdown-toggle.btn-dark {
  color: #ffffff !important;
  background-color: #2f3342;
  border-color: #292d39;
}

.btn-dark:active,
.btn-dark.active,
.open .dropdown-toggle.btn-dark {
  background-image: none;
}

.btn-dark.disabled,
.btn-dark[disabled],
fieldset[disabled] .btn-dark,
.btn-dark.disabled:hover,
.btn-dark[disabled]:hover,
fieldset[disabled] .btn-dark:hover,
.btn-dark.disabled:focus,
.btn-dark[disabled]:focus,
fieldset[disabled] .btn-dark:focus,
.btn-dark.disabled:active,
.btn-dark[disabled]:active,
fieldset[disabled] .btn-dark:active,
.btn-dark.disabled.active,
.btn-dark[disabled].active,
fieldset[disabled] .btn-dark.active {
  background-color: #3a3f51;
  border-color: #3a3f51;
}

.btn-black {
  color: #ffffff !important;
  background-color: #1c2b36;
  border-color: #1c2b36;
}

.btn-black:hover,
.btn-black:focus,
.btn-black:active,
.btn-black.active,
.open .dropdown-toggle.btn-black {
  color: #ffffff !important;
  background-color: #131e25;
  border-color: #0e161b;
}

.btn-black:active,
.btn-black.active,
.open .dropdown-toggle.btn-black {
  background-image: none;
}

.btn-black.disabled,
.btn-black[disabled],
fieldset[disabled] .btn-black,
.btn-black.disabled:hover,
.btn-black[disabled]:hover,
fieldset[disabled] .btn-black:hover,
.btn-black.disabled:focus,
.btn-black[disabled]:focus,
fieldset[disabled] .btn-black:focus,
.btn-black.disabled:active,
.btn-black[disabled]:active,
fieldset[disabled] .btn-black:active,
.btn-black.disabled.active,
.btn-black[disabled].active,
fieldset[disabled] .btn-black.active {
  background-color: #1c2b36;
  border-color: #1c2b36;
}

.btn-icon {
  width: 34px;
  height: 34px;
  padding: 0 !important;
  text-align: center;
}

.btn-icon i {
  position: relative;
  top: -1px;
  line-height: 34px;
}

.btn-icon.btn-sm {
  width: 30px;
  height: 30px;
}

.btn-icon.btn-sm i {
  line-height: 30px;
}

.btn-icon.btn-lg {
  width: 45px;
  height: 45px;
}

.btn-icon.btn-lg i {
  line-height: 45px;
}

.btn-rounded {
  padding-right: 15px;
  padding-left: 15px;
  border-radius: 50px;
}

.btn-rounded.btn-lg {
  padding-right: 25px;
  padding-left: 25px;
}

.btn > i.pull-left,
.btn > i.pull-right {
  line-height: 1.42857143;
}

.btn-block {
  padding-right: 12px;
  padding-left: 12px;
}

.btn-group-vertical > .btn:first-child:not(:last-child) {
  border-top-right-radius: 2px;
}

.btn-group-vertical > .btn:last-child:not(:first-child) {
  border-bottom-left-radius: 2px;
}

.btn-addon i {
  position: relative;
  float: left;
  width: 34px;
  height: 34px;
  margin: -7px -12px;
  margin-right: 12px;
  line-height: 34px;
  text-align: center;
  background-color: rgba(0, 0, 0, 0.1);
  border-radius: 2px 0 0 2px;
}

.btn-addon i.pull-right {
  margin-right: -12px;
  margin-left: 12px;
  border-radius: 0 2px 2px 0;
}

.btn-addon.btn-sm i {
  width: 30px;
  height: 30px;
  margin: -6px -10px;
  margin-right: 10px;
  line-height: 30px;
}

.btn-addon.btn-sm i.pull-right {
  margin-right: -10px;
  margin-left: 10px;
}

.btn-addon.btn-lg i {
  width: 45px;
  height: 45px;
  margin: -11px -16px;
  margin-right: 16px;
  line-height: 45px;
}

.btn-addon.btn-lg i.pull-right {
  margin-right: -16px;
  margin-left: 16px;
}

.btn-addon.btn-default i {
  background-color: transparent;
  border-right: 1px solid #dee5e7;
}

.btn-groups .btn {
  margin-bottom: 5px;
}

.list-icon i {
  display: inline-block;
  width: 40px;
  margin: 0;
  text-align: center;
  vertical-align: middle;
  -webkit-transition: font-size 0.2s;
          transition: font-size 0.2s;
}

.list-icon div {
  line-height: 40px;
  white-space: nowrap;
}

.list-icon div:hover i {
  font-size: 26px;
}

.settings {
  position: fixed;
  top: 120px;
  right: -240px;
  z-index: 1050;
  width: 240px;
  -webkit-transition: all 0.2s;
          transition: all 0.2s;
}

.settings.active {
  right: -1px;
}

.settings > .btn {
  position: absolute;
  top: -1px;
  left: -42px;
  padding: 10px 15px;
  background: #f6f8f8 !important;
  border-color: #dee5e7;
  border-right-width: 0;
}

.settings .i-checks span b {
  display: inline-block;
  float: left;
  width: 50%;
  height: 20px;
}

.settings .i-checks span b.header {
  height: 10px;
}

.streamline {
  position: relative;
  border-color: #dee5e7;
}

.streamline .sl-item:after,
.streamline:after {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 9px;
  height: 9px;
  margin-left: -5px;
  background-color: #fff;
  border-color: inherit;
  border-style: solid;
  border-width: 1px;
  border-radius: 10px;
  content: '';
}

.sl-item {
  position: relative;
  padding-bottom: 1px;
  border-color: #dee5e7;
}

.sl-item:before,
.sl-item:after {
  display: table;
  content: " ";
}

.sl-item:after {
  clear: both;
}

.sl-item:after {
  top: 6px;
  bottom: auto;
}

.sl-item.b-l {
  margin-left: -1px;
}

.timeline {
  padding: 0;
  margin: 0;
}

.tl-item {
  display: block;
}

.tl-item:before,
.tl-item:after {
  display: table;
  content: " ";
}

.tl-item:after {
  clear: both;
}

.visible-left {
  display: none;
}

.tl-wrap {
  display: block;
  padding: 15px 0 15px 20px;
  margin-left: 6em;
  border-color: #dee5e7;
  border-style: solid;
  border-width: 0 0 0 4px;
}

.tl-wrap:before,
.tl-wrap:after {
  display: table;
  content: " ";
}

.tl-wrap:after {
  clear: both;
}

.tl-wrap:before {
  position: relative;
  top: 15px;
  float: left;
  width: 10px;
  height: 10px;
  margin-left: -27px;
  background: #edf1f2;
  border-color: inherit;
  border-style: solid;
  border-width: 3px;
  border-radius: 50%;
  content: "";
  box-shadow: 0 0 0 4px #f0f3f4;
}

.tl-wrap:hover:before {
  background: transparent;
  border-color: #fff;
}

.tl-date {
  position: relative;
  top: 10px;
  display: block;
  float: left;
  width: 4.5em;
  margin-left: -7.5em;
  text-align: right;
}

.tl-content {
  position: relative;
  display: inline-block;
  padding-top: 10px;
  padding-bottom: 10px;
}

.tl-content.block {
  display: block;
  width: 100%;
}

.tl-content.panel {
  margin-bottom: 0;
}
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

.tl-header {
  display: block;
  width: 12em;
  margin-right: 2px;
  margin-left: 2px;
  text-align: center;
}

.timeline-center .tl-item {
  margin-left: 50%;
}

.timeline-center .tl-item .tl-wrap {
  margin-left: -2px;
}

.timeline-center .tl-header {
  width: auto;
  margin: 0;
}

.timeline-center .tl-left {
  margin-right: 50%;
  margin-left: 0;
}

.timeline-center .tl-left .hidden-left {
  display: none !important;
}

.timeline-center .tl-left .visible-left {
  display: inherit;
}

.timeline-center .tl-left .tl-wrap {
  float: right;
  padding-right: 20px;
  padding-left: 0;
  margin-right: -2px;
  border-right-width: 4px;
  border-left-width: 0;
}

.timeline-center .tl-left .tl-wrap:before {
  float: right;
  margin-right: -27px;
  margin-left: 0;
}

.timeline-center .tl-left .tl-date {
  float: right;
  margin-right: -8.5em;
  margin-left: 0;
  text-align: left;
}

.i-switch {
  position: relative;
  display: inline-block;
  width: 35px;
  height: 20px;
  margin: 0;
  cursor: pointer;
  background-color: #27c24c;
  border-radius: 30px;
}

.i-switch input {
  position: absolute;
  opacity: 0;
  filter: alpha(opacity=0);
}

.i-switch input:checked + i:before {
  top: 50%;
  right: 5px;
  bottom: 50%;
  left: 50%;
  border-width: 0;
  border-radius: 5px;
}

.i-switch input:checked + i:after {
  margin-left: 16px;
}

.i-switch i:before {
  position: absolute;
  top: -1px;
  right: -1px;
  bottom: -1px;
  left: -1px;
  background-color: #fff;
  border: 1px solid #f0f0f0;
  border-radius: 30px;
  content: "";
  -webkit-transition: all 0.2s;
          transition: all 0.2s;
}

.i-switch i:after {
  position: absolute;
  top: 1px;
  bottom: 1px;
  width: 18px;
  background-color: #fff;
  border-radius: 50%;
  content: "";
  -webkit-box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.25);
          box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.25);
  -webkit-transition: margin-left 0.3s;
          transition: margin-left 0.3s;
}

.i-switch-md {
  width: 40px;
  height: 24px;
}

.i-switch-md input:checked + i:after {
  margin-left: 17px;
}

.i-switch-md i:after {
  width: 22px;
}

.i-switch-lg {
  width: 50px;
  height: 30px;
}

.i-switch-lg input:checked + i:after {
  margin-left: 21px;
}

.i-switch-lg i:after {
  width: 28px;
}

.i-checks {
  padding-left: 20px;
  cursor: pointer;
}

.i-checks input {
  position: absolute;
  margin-left: -20px;
  opacity: 0;
}

.i-checks input:checked + i {
  border-color: #23b7e5;
}

.i-checks input:checked + i:before {
  top: 4px;
  left: 4px;
  width: 10px;
  height: 10px;
  background-color: #23b7e5;
}

.i-checks input:checked + span .active {
  display: inherit;
}

.i-checks input[type="radio"] + i,
.i-checks input[type="radio"] + i:before {
  border-radius: 50%;
}

.i-checks input[disabled] + i,
fieldset[disabled] .i-checks input + i {
  border-color: #dee5e7;
}

.i-checks input[disabled] + i:before,
fieldset[disabled] .i-checks input + i:before {
  background-color: #dee5e7;
}

.i-checks > i {
  position: relative;
  display: inline-block;
  width: 20px;
  height: 20px;
  margin-top: -2px;
  margin-right: 4px;
  margin-left: -20px;
  line-height: 1;
  vertical-align: middle;
  background-color: #fff;
  border: 1px solid #cfdadd;
}

.i-checks > i:before {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 0;
  height: 0;
  background-color: transparent;
  content: "";
  -webkit-transition: all 0.2s;
          transition: all 0.2s;
}

.i-checks > span {
  margin-left: -20px;
}

.i-checks > span .active {
  display: none;
}

.i-checks-sm input:checked + i:before {
  top: 3px;
  left: 3px;
  width: 8px;
  height: 8px;
}

.i-checks-sm > i {
  width: 16px;
  height: 16px;
  margin-right: 6px;
  margin-left: -18px;
}

.i-checks-lg input:checked + i:before {
  top: 8px;
  left: 8px;
  width: 12px;
  height: 12px;
}

.i-checks-lg > i {
  width: 30px;
  height: 30px;
}

.datepicker {
  margin: 0 5px;
}

.datepicker .btn-default {
  border-width: 0;
  box-shadow: none;
}

.datepicker .btn[disabled] {
  opacity: 0.4;
}

.datepicker .btn-info .text-info {
  color: #fff !important;
}

/*Charts*/

.jqstooltip {
  max-height: 12px;
  padding: 5px 10px !important;
  background-color: rgba(0, 0, 0, 0.8) !important;
  border: solid 1px #000 !important;
  -webkit-border-radius: 3px;
     -moz-border-radius: 3px;
          border-radius: 3px;
  -webkit-box-sizing: content-box;
     -moz-box-sizing: content-box;
          box-sizing: content-box;
}

.easyPieChart {
  position: relative;
  text-align: center;
}

.easyPieChart > div {
  position: relative;
  z-index: 1;
}

.easyPieChart > div .text {
  position: absolute;
  top: 60%;
  width: 100%;
  line-height: 1;
}

.easyPieChart > div img {
  margin-top: -4px;
}

.easyPieChart canvas {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 0;
}

#flotTip,
.flotTip {
  z-index: 100;
  padding: 4px 10px;
  font-size: 12px;
  color: #fff;
  background-color: rgba(0, 0, 0, 0.8);
  border: solid 1px #000 !important;
  -webkit-border-radius: 3px;
     -moz-border-radius: 3px;
          border-radius: 3px;
}

.legendColorBox > div {
  margin: 5px;
  border: none !important;
}

.legendColorBox > div > div {
  border-radius: 10px;
}

.sortable-placeholder {
  min-height: 50px;
  margin-bottom: 5px;
  list-style: none;
  border: 1px dashed #CCC;
}

.panel .dataTables_wrapper {
  padding-top: 10px;
}

.panel .dataTables_wrapper > .row {
  margin: 0;
}

.panel .dataTables_wrapper > .row > .col-sm-12 {
  padding: 0;
}

.st-sort-ascent:before {
  content: '\25B2';
}

.st-sort-descent:before {
  content: '\25BC';
}

.st-selected td {
  background: #f0f9ec !important;
}

.chosen-choices,
.chosen-single,
.bootstrap-tagsinput {
  border-color: #cfdadd !important;
  border-radius: 2px !important;
}

.bootstrap-tagsinput {
  padding: 5px 12px !important;
}

.item {
  position: relative;
}

.item .top {
  position: absolute;
  top: 0;
  left: 0;
}

.item .bottom {
  position: absolute;
  bottom: 0;
  left: 0;
}

.item .center {
  position: absolute;
  top: 50%;
}

.item-overlay {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  display: none;
}

.item-overlay.active,
.item:hover .item-overlay {
  display: block;
}

.form-validation .form-control.ng-dirty.ng-invalid {
  border-color: #f05050;
}

.form-validation .form-control.ng-dirty.ng-valid,
.form-validation .form-control.ng-dirty.ng-valid:focus {
  border-color: #27c24c;
}

.form-validation .i-checks .ng-invalid.ng-dirty + i {
  border-color: #f05050;
}

.ng-animate .bg-auto:before {
  display: none;
}

[ui-view].ng-leave {
  display: none;
}

[ui-view].ng-leave.smooth {
  display: block;
}

.smooth.ng-animate {
  position: absolute;
  width: 100%;
  height: 100%;
  overflow: hidden;
}

.fade-in-right-big.ng-enter {
  -webkit-animation: fadeInRightBig 0.5s;
          animation: fadeInRightBig 0.5s;
}

.fade-in-right-big.ng-leave {
  -webkit-animation: fadeOutLeftBig 0.5s;
          animation: fadeOutLeftBig 0.5s;
}

.fade-in-left-big.ng-enter {
  -webkit-animation: fadeInLeftBig 0.5s;
          animation: fadeInLeftBig 0.5s;
}

.fade-in-left-big.ng-leave {
  -webkit-animation: fadeOutRightBig 0.5s;
          animation: fadeOutRightBig 0.5s;
}

.fade-in-up-big.ng-enter {
  -webkit-animation: fadeInUpBig 0.5s;
          animation: fadeInUpBig 0.5s;
}

.fade-in-up-big.ng-leave {
  -webkit-animation: fadeOutUpBig 0.5s;
          animation: fadeOutUpBig 0.5s;
}

.fade-in-down-big.ng-enter {
  -webkit-animation: fadeInDownBig 0.5s;
          animation: fadeInDownBig 0.5s;
}

.fade-in-down-big.ng-leave {
  -webkit-animation: fadeOutDownBig 0.5s;
          animation: fadeOutDownBig 0.5s;
}

.fade-in.ng-enter {
  -webkit-animation: fadeIn 0.5s;
          animation: fadeIn 0.5s;
}

.fade-in.ng-leave {
  -webkit-animation: fadeOut 0.5s;
          animation: fadeOut 0.5s;
}

.fade-in-right.ng-enter {
  -webkit-animation: fadeInRight 0.5s;
          animation: fadeInRight 0.5s;
}

.fade-in-right.ng-leave {
  -webkit-animation: fadeOutLeft 0.5s;
          animation: fadeOutLeft 0.5s;
}

.fade-in-left.ng-enter {
  -webkit-animation: fadeInLeft 0.5s;
          animation: fadeInLeft 0.5s;
}

.fade-in-left.ng-leave {
  -webkit-animation: fadeOutRight 0.5s;
          animation: fadeOutRight 0.5s;
}

.fade-in-up.ng-enter {
  -webkit-animation: fadeInUp 0.5s;
          animation: fadeInUp 0.5s;
}

.fade-in-up.ng-leave {
  -webkit-animation: fadeOutUp 0.5s;
          animation: fadeOutUp 0.5s;
}

.fade-in-down.ng-enter {
  -webkit-animation: fadeInDown 0.5s;
          animation: fadeInDown 0.5s;
}

.fade-in-down.ng-leave {
  -webkit-animation: fadeOutDown 0.5s;
          animation: fadeOutDown 0.5s;
}

.bg-gd {
  background-image: -webkit-linear-gradient(top, rgba(40, 50, 60, 0) 0, rgba(40, 50, 60, 0.075) 100%);
  background-image: -o-linear-gradient(top, rgba(40, 50, 60, 0) 0, rgba(40, 50, 60, 0.075) 100%);
  background-image: linear-gradient(to bottom, rgba(40, 50, 60, 0) 0, rgba(40, 50, 60, 0.075) 100%);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0028323c', endColorstr='#1328323c', GradientType=0);
  filter: none;
}

.bg-gd-dk {
  background-image: -webkit-linear-gradient(top, rgba(40, 50, 60, 0) 10%, rgba(40, 50, 60, 0.5) 100%);
  background-image: -o-linear-gradient(top, rgba(40, 50, 60, 0) 10%, rgba(40, 50, 60, 0.5) 100%);
  background-image: linear-gradient(to bottom, rgba(40, 50, 60, 0) 10%, rgba(40, 50, 60, 0.5) 100%);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0028323c', endColorstr='#8028323c', GradientType=0);
  filter: none;
}

.bg-light {
  color: #58666e;
  background-color: #edf1f2;
}

.bg-light.lt,
.bg-light .lt {
  background-color: #f3f5f6;
}

.bg-light.lter,
.bg-light .lter {
  background-color: #f6f8f8;
}

.bg-light.dk,
.bg-light .dk {
  background-color: #e4eaec;
}

.bg-light.dker,
.bg-light .dker {
  background-color: #dde6e9;
}

.bg-light.bg,
.bg-light .bg {
  background-color: #edf1f2;
}

.bg-dark {
  color: #a6a8b1;
  background-color: #3a3f51;
}

.bg-dark.lt,
.bg-dark .lt {
  background-color: #474c5e;
}

.bg-dark.lter,
.bg-dark .lter {
  background-color: #54596a;
}

.bg-dark.dk,
.bg-dark .dk {
  background-color: #2e3344;
}

.bg-dark.dker,
.bg-dark .dker {
  background-color: #232735;
}

.bg-dark.bg,
.bg-dark .bg {
  background-color: #3a3f51;
}

.bg-dark a {
  color: #c1c3c9;
}

.bg-dark a:hover {
  color: #ffffff;
}

.bg-dark a.list-group-item:hover,
.bg-dark a.list-group-item:focus {
  background-color: inherit;
}

.bg-dark .nav > li:hover > a,
.bg-dark .nav > li:focus > a,
.bg-dark .nav > li.active > a {
  color: #ffffff;
  background-color: #2e3344;
}

.bg-dark .nav > li > a {
  color: #b4b6bd;
}

.bg-dark .nav > li > a:hover,
.bg-dark .nav > li > a:focus {
  background-color: #32374a;
}

.bg-dark .nav .open > a {
  background-color: #2e3344;
}

.bg-dark .caret {
  border-top-color: #a6a8b1;
  border-bottom-color: #a6a8b1;
}

.bg-dark.navbar .nav > li.active > a {
  color: #ffffff;
  background-color: #2e3344;
}

.bg-dark .open > a,
.bg-dark .open > a:hover,
.bg-dark .open > a:focus {
  color: #ffffff;
}

.bg-dark .text-muted {
  color: #8b8e99 !important;
}

.bg-dark .text-lt {
  color: #eaebed !important;
}

.bg-dark.auto .list-group-item,
.bg-dark .auto .list-group-item {
  background-color: transparent;
  border-color: #2f3342 !important;
}

.bg-dark.auto .list-group-item:hover,
.bg-dark .auto .list-group-item:hover,
.bg-dark.auto .list-group-item:focus,
.bg-dark .auto .list-group-item:focus,
.bg-dark.auto .list-group-item:active,
.bg-dark .auto .list-group-item:active,
.bg-dark.auto .list-group-item.active,
.bg-dark .auto .list-group-item.active {
  background-color: #2e3344 !important;
}

.bg-black {
  color: #7793a7;
  background-color: #1c2b36;
}

.bg-black.lt,
.bg-black .lt {
  background-color: #263845;
}

.bg-black.lter,
.bg-black .lter {
  background-color: #314554;
}

.bg-black.dk,
.bg-black .dk {
  background-color: #131e26;
}

.bg-black.dker,
.bg-black .dker {
  background-color: #0a1015;
}

.bg-black.bg,
.bg-black .bg {
  background-color: #1c2b36;
}

.bg-black a {
  color: #96abbb;
}

.bg-black a:hover {
  color: #ffffff;
}

.bg-black a.list-group-item:hover,
.bg-black a.list-group-item:focus {
  background-color: inherit;
}

.bg-black .nav > li:hover > a,
.bg-black .nav > li:focus > a,
.bg-black .nav > li.active > a {
  color: #ffffff;
  background-color: #131e26;
}

.bg-black .nav > li > a {
  color: #869fb1;
}

.bg-black .nav > li > a:hover,
.bg-black .nav > li > a:focus {
  background-color: #16232d;
}

.bg-black .nav .open > a {
  background-color: #131e26;
}

.bg-black .caret {
  border-top-color: #7793a7;
  border-bottom-color: #7793a7;
}

.bg-black.navbar .nav > li.active > a {
  color: #ffffff;
  background-color: #131e26;
}

.bg-black .open > a,
.bg-black .open > a:hover,
.bg-black .open > a:focus {
  color: #ffffff;
}

.bg-black .text-muted {
  color: #5c798f !important;
}

.bg-black .text-lt {
  color: #c4d0d9 !important;
}

.bg-black.auto .list-group-item,
.bg-black .auto .list-group-item {
  background-color: transparent;
  border-color: #131e25 !important;
}

.bg-black.auto .list-group-item:hover,
.bg-black .auto .list-group-item:hover,
.bg-black.auto .list-group-item:focus,
.bg-black .auto .list-group-item:focus,
.bg-black.auto .list-group-item:active,
.bg-black .auto .list-group-item:active,
.bg-black.auto .list-group-item.active,
.bg-black .auto .list-group-item.active {
  background-color: #131e26 !important;
}

.bg-primary {
  color: #f4f3f9;
  background-color: #7266ba;
}

.bg-primary.lt,
.bg-primary .lt {
  background-color: #847abf;
}

.bg-primary.lter,
.bg-primary .lter {
  background-color: #958dc6;
}

.bg-primary.dk,
.bg-primary .dk {
  background-color: #6051b5;
}

.bg-primary.dker,
.bg-primary .dker {
  background-color: #5244a9;
}

.bg-primary.bg,
.bg-primary .bg {
  background-color: #7266ba;
}

.bg-primary a {
  color: #ffffff;
}

.bg-primary a:hover {
  color: #ffffff;
}

.bg-primary a.list-group-item:hover,
.bg-primary a.list-group-item:focus {
  background-color: inherit;
}

.bg-primary .nav > li:hover > a,
.bg-primary .nav > li:focus > a,
.bg-primary .nav > li.active > a {
  color: #ffffff;
  background-color: #6051b5;
}

.bg-primary .nav > li > a {
  color: #f2f2f2;
}

.bg-primary .nav > li > a:hover,
.bg-primary .nav > li > a:focus {
  background-color: #6658b8;
}

.bg-primary .nav .open > a {
  background-color: #6051b5;
}

.bg-primary .caret {
  border-top-color: #f4f3f9;
  border-bottom-color: #f4f3f9;
}

.bg-primary.navbar .nav > li.active > a {
  color: #ffffff;
  background-color: #6051b5;
}

.bg-primary .open > a,
.bg-primary .open > a:hover,
.bg-primary .open > a:focus {
  color: #ffffff;
}

.bg-primary .text-muted {
  color: #d6d3e6 !important;
}

.bg-primary .text-lt {
  color: #ffffff !important;
}

.bg-primary.auto .list-group-item,
.bg-primary .auto .list-group-item {
  background-color: transparent;
  border-color: #6254b2 !important;
}

.bg-primary.auto .list-group-item:hover,
.bg-primary .auto .list-group-item:hover,
.bg-primary.auto .list-group-item:focus,
.bg-primary .auto .list-group-item:focus,
.bg-primary.auto .list-group-item:active,
.bg-primary .auto .list-group-item:active,
.bg-primary.auto .list-group-item.active,
.bg-primary .auto .list-group-item.active {
  background-color: #6051b5 !important;
}

.bg-success {
  color: #c6efd0;
  background-color: #27c24c;
}

.bg-success.lt,
.bg-success .lt {
  background-color: #31d257;
}

.bg-success.lter,
.bg-success .lter {
  background-color: #48d46a;
}

.bg-success.dk,
.bg-success .dk {
  background-color: #20af42;
}

.bg-success.dker,
.bg-success .dker {
  background-color: #1a9c39;
}

.bg-success.bg,
.bg-success .bg {
  background-color: #27c24c;
}

.bg-success a {
  color: #eefaf1;
}

.bg-success a:hover {
  color: #ffffff;
}

.bg-success a.list-group-item:hover,
.bg-success a.list-group-item:focus {
  background-color: inherit;
}

.bg-success .nav > li:hover > a,
.bg-success .nav > li:focus > a,
.bg-success .nav > li.active > a {
  color: #ffffff;
  background-color: #20af42;
}

.bg-success .nav > li > a {
  color: #daf5e0;
}

.bg-success .nav > li > a:hover,
.bg-success .nav > li > a:focus {
  background-color: #22b846;
}

.bg-success .nav .open > a {
  background-color: #20af42;
}

.bg-success .caret {
  border-top-color: #c6efd0;
  border-bottom-color: #c6efd0;
}

.bg-success.navbar .nav > li.active > a {
  color: #ffffff;
  background-color: #20af42;
}

.bg-success .open > a,
.bg-success .open > a:hover,
.bg-success .open > a:focus {
  color: #ffffff;
}

.bg-success .text-muted {
  color: #9ee4af !important;
}

.bg-success .text-lt {
  color: #ffffff !important;
}

.bg-success.auto .list-group-item,
.bg-success .auto .list-group-item {
  background-color: transparent;
  border-color: #23ad44 !important;
}

.bg-success.auto .list-group-item:hover,
.bg-success .auto .list-group-item:hover,
.bg-success.auto .list-group-item:focus,
.bg-success .auto .list-group-item:focus,
.bg-success.auto .list-group-item:active,
.bg-success .auto .list-group-item:active,
.bg-success.auto .list-group-item.active,
.bg-success .auto .list-group-item.active {
  background-color: #20af42 !important;
}

.bg-info {
  color: #dcf2f8;
  background-color: #23b7e5;
}

.bg-info.lt,
.bg-info .lt {
  background-color: #3dbde5;
}

.bg-info.lter,
.bg-info .lter {
  background-color: #55c3e6;
}

.bg-info.dk,
.bg-info .dk {
  background-color: #16aad8;
}

.bg-info.dker,
.bg-info .dker {
  background-color: #1199c4;
}

.bg-info.bg,
.bg-info .bg {
  background-color: #23b7e5;
}

.bg-info a {
  color: #ffffff;
}

.bg-info a:hover {
  color: #ffffff;
}

.bg-info a.list-group-item:hover,
.bg-info a.list-group-item:focus {
  background-color: inherit;
}

.bg-info .nav > li:hover > a,
.bg-info .nav > li:focus > a,
.bg-info .nav > li.active > a {
  color: #ffffff;
  background-color: #16aad8;
}

.bg-info .nav > li > a {
  color: #f2f2f2;
}

.bg-info .nav > li > a:hover,
.bg-info .nav > li > a:focus {
  background-color: #17b2e2;
}

.bg-info .nav .open > a {
  background-color: #16aad8;
}

.bg-info .caret {
  border-top-color: #dcf2f8;
  border-bottom-color: #dcf2f8;
}

.bg-info.navbar .nav > li.active > a {
  color: #ffffff;
  background-color: #16aad8;
}

.bg-info .open > a,
.bg-info .open > a:hover,
.bg-info .open > a:focus {
  color: #ffffff;
}

.bg-info .text-muted {
  color: #b0e1f1 !important;
}

.bg-info .text-lt {
  color: #ffffff !important;
}

.bg-info.auto .list-group-item,
.bg-info .auto .list-group-item {
  background-color: transparent;
  border-color: #19a9d5 !important;
}

.bg-info.auto .list-group-item:hover,
.bg-info .auto .list-group-item:hover,
.bg-info.auto .list-group-item:focus,
.bg-info .auto .list-group-item:focus,
.bg-info.auto .list-group-item:active,
.bg-info .auto .list-group-item:active,
.bg-info.auto .list-group-item.active,
.bg-info .auto .list-group-item.active {
  background-color: #16aad8 !important;
}

.bg-warning {
  color: #fffefa;
  background-color: #fad733;
}

.bg-warning.lt,
.bg-warning .lt {
  background-color: #f8da4e;
}

.bg-warning.lter,
.bg-warning .lter {
  background-color: #f7de69;
}

.bg-warning.dk,
.bg-warning .dk {
  background-color: #fcd417;
}

.bg-warning.dker,
.bg-warning .dker {
  background-color: #face00;
}

.bg-warning.bg,
.bg-warning .bg {
  background-color: #fad733;
}

.bg-warning a {
  color: #ffffff;
}

.bg-warning a:hover {
  color: #ffffff;
}

.bg-warning a.list-group-item:hover,
.bg-warning a.list-group-item:focus {
  background-color: inherit;
}

.bg-warning .nav > li:hover > a,
.bg-warning .nav > li:focus > a,
.bg-warning .nav > li.active > a {
  color: #ffffff;
  background-color: #fcd417;
}

.bg-warning .nav > li > a {
  color: #f2f2f2;
}

.bg-warning .nav > li > a:hover,
.bg-warning .nav > li > a:focus {
  background-color: #fcd621;
}

.bg-warning .nav .open > a {
  background-color: #fcd417;
}

.bg-warning .caret {
  border-top-color: #fffefa;
  border-bottom-color: #fffefa;
}

.bg-warning.navbar .nav > li.active > a {
  color: #ffffff;
  background-color: #fcd417;
}

.bg-warning .open > a,
.bg-warning .open > a:hover,
.bg-warning .open > a:focus {
  color: #ffffff;
}

.bg-warning .text-muted {
  color: #fbf2cb !important;
}

.bg-warning .text-lt {
  color: #ffffff !important;
}

.bg-warning.auto .list-group-item,
.bg-warning .auto .list-group-item {
  background-color: transparent;
  border-color: #f9d21a !important;
}

.bg-warning.auto .list-group-item:hover,
.bg-warning .auto .list-group-item:hover,
.bg-warning.auto .list-group-item:focus,
.bg-warning .auto .list-group-item:focus,
.bg-warning.auto .list-group-item:active,
.bg-warning .auto .list-group-item:active,
.bg-warning.auto .list-group-item.active,
.bg-warning .auto .list-group-item.active {
  background-color: #fcd417 !important;
}

.bg-danger {
  color: #ffffff;
  background-color: #f05050;
}

.bg-danger.lt,
.bg-danger .lt {
  background-color: #f06a6a;
}

.bg-danger.lter,
.bg-danger .lter {
  background-color: #f18282;
}

.bg-danger.dk,
.bg-danger .dk {
  background-color: #f13636;
}

.bg-danger.dker,
.bg-danger .dker {
  background-color: #f21b1b;
}

.bg-danger.bg,
.bg-danger .bg {
  background-color: #f05050;
}

.bg-danger a {
  color: #ffffff;
}

.bg-danger a:hover {
  color: #ffffff;
}

.bg-danger a.list-group-item:hover,
.bg-danger a.list-group-item:focus {
  background-color: inherit;
}

.bg-danger .nav > li:hover > a,
.bg-danger .nav > li:focus > a,
.bg-danger .nav > li.active > a {
  color: #ffffff;
  background-color: #f13636;
}

.bg-danger .nav > li > a {
  color: #f2f2f2;
}

.bg-danger .nav > li > a:hover,
.bg-danger .nav > li > a:focus {
  background-color: #f13f3f;
}

.bg-danger .nav .open > a {
  background-color: #f13636;
}

.bg-danger .caret {
  border-top-color: #ffffff;
  border-bottom-color: #ffffff;
}

.bg-danger.navbar .nav > li.active > a {
  color: #ffffff;
  background-color: #f13636;
}

.bg-danger .open > a,
.bg-danger .open > a:hover,
.bg-danger .open > a:focus {
  color: #ffffff;
}

.bg-danger .text-muted {
  color: #e6e6e6 !important;
}

.bg-danger .text-lt {
  color: #ffffff !important;
}

.bg-danger.auto .list-group-item,
.bg-danger .auto .list-group-item {
  background-color: transparent;
  border-color: #ee3939 !important;
}

.bg-danger.auto .list-group-item:hover,
.bg-danger .auto .list-group-item:hover,
.bg-danger.auto .list-group-item:focus,
.bg-danger .auto .list-group-item:focus,
.bg-danger.auto .list-group-item:active,
.bg-danger .auto .list-group-item:active,
.bg-danger.auto .list-group-item.active,
.bg-danger .auto .list-group-item.active {
  background-color: #f13636 !important;
}

.bg-white {
  color: #58666e;
  background-color: #fff;
}

.bg-white a {
  color: inherit;
}

.bg-white a:hover {
  color: inherit;
}

.bg-white .text-muted {
  color: #98a6ad !important;
}

.bg-white .lt,
.bg-white .lter,
.bg-white .dk,
.bg-white .dker {
  background-color: #fff;
}

.bg-white-only {
  background-color: #fff;
}

.bg-white-opacity {
  background-color: rgba(255, 255, 255, 0.5);
}

.bg-black-opacity {
  background-color: rgba(32, 43, 54, 0.5);
}

a.bg-light:hover {
  color: inherit;
}

a.bg-primary:hover {
  background-color: #6254b2;
}

a.text-primary:hover {
  color: #6254b2;
}

.text-primary {
  color: #7266ba;
}

.text-primary-lt {
  color: #8278c2;
}

.text-primary-lter {
  color: #9289ca;
}

.text-primary-dk {
  color: #6254b2;
}

.text-primary-dker {
  color: #564aa3;
}

a.bg-info:hover {
  background-color: #19a9d5;
}

a.text-info:hover {
  color: #19a9d5;
}

.text-info {
  color: #23b7e5;
}

.text-info-lt {
  color: #3abee8;
}

.text-info-lter {
  color: #51c6ea;
}

.text-info-dk {
  color: #19a9d5;
}

.text-info-dker {
  color: #1797be;
}
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

a.bg-success:hover {
  background-color: #23ad44;
}

a.text-success:hover {
  color: #23ad44;
}

.text-success {
  color: #27c24c;
}

.text-success-lt {
  color: #2ed556;
}

.text-success-lter {
  color: #43d967;
}

.text-success-dk {
  color: #23ad44;
}

.text-success-dker {
  color: #1e983b;
}

a.bg-warning:hover {
  background-color: #f9d21a;
}

a.text-warning:hover {
  color: #f9d21a;
}

.text-warning {
  color: #fad733;
}

.text-warning-lt {
  color: #fbdc4c;
}

.text-warning-lter {
  color: #fbe165;
}

.text-warning-dk {
  color: #f9d21a;
}

.text-warning-dker {
  color: #f4ca06;
}

a.bg-danger:hover {
  background-color: #ee3939;
}

a.text-danger:hover {
  color: #ee3939;
}

.text-danger {
  color: #f05050;
}

.text-danger-lt {
  color: #f26767;
}

.text-danger-lter {
  color: #f47f7f;
}

.text-danger-dk {
  color: #ee3939;
}

.text-danger-dker {
  color: #ec2121;
}

a.bg-dark:hover {
  background-color: #2f3342;
}

a.text-dark:hover {
  color: #2f3342;
}

.text-dark {
  color: #3a3f51;
}

.text-dark-lt {
  color: #454b60;
}

.text-dark-lter {
  color: #4f566f;
}

.text-dark-dk {
  color: #2f3342;
}

.text-dark-dker {
  color: #252833;
}

a.bg-#000000:hover {
  background-color: #131e25;
}

a.text-#000000:hover {
  color: #131e25;
}

.text-#000000 {
  color: #1c2b36;
}

.text-#000000-lt {
  color: #253847;
}

.text-#000000-lter {
  color: #2d4658;
}

.text-#000000-dk {
  color: #131e25;
}

.text-#000000-dker {
  color: #0b1014;
}

.text-white {
  color: #fff;
}

.text-black {
  color: #000;
}

.text-muted {
  color: #98a6ad;
}

.bg {
  background-color: #f0f3f4;
}

.pos-rlt {
  position: relative;
}

.pos-stc {
  position: static !important;
}

.pos-abt {
  position: absolute;
}

.pos-fix {
  position: fixed;
}

.show {
  visibility: visible;
}

.line {
  width: 100%;
  height: 2px;
  margin: 10px 0;
  overflow: hidden;
  font-size: 0;
}

.line-xs {
  margin: 0;
}

.line-lg {
  margin-top: 15px;
  margin-bottom: 15px;
}

.line-dashed {
  background-color: transparent;
  border-style: dashed !important;
  border-width: 0;
}

.no-line {
  border-width: 0;
}

.no-border,
.no-borders {
  border-color: transparent;
  border-width: 0;
}

.no-radius {
  border-radius: 0;
}

.block {
  display: block;
}

.block.hide {
  display: none;
}

.inline {
  display: inline-block !important;
}

.none {
  display: none;
}

.pull-none {
  float: none;
}

.rounded {
  border-radius: 500px;
}

.clear {
  display: block;
  overflow: hidden;
}

.no-bg {
  color: inherit;
  background-color: transparent;
}

.no-select {
  -webkit-user-select: none;
   -khtml-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  -webkit-touch-callout: none;
}

.l-h {
  line-height: 1.42857143;
}

.l-h-0x {
  line-height: 0;
}

.l-h-1x {
  line-height: 1.2;
}

.l-h-2x {
  line-height: 2em;
}

.l-s-1x {
  letter-spacing: 1;
}

.l-s-2x {
  letter-spacing: 2;
}

.l-s-3x {
  letter-spacing: 3;
}

.font-normal {
  font-weight: normal;
}

.font-thin {
  font-weight: 300;
}

.font-bold {
  font-weight: 700;
}

.text-3x {
  font-size: 3em;
}

.text-2x {
  font-size: 2em;
}

.text-lg {
  font-size: 18px;
}

.text-md {
  font-size: 16px;
}

.text-base {
  font-size: 14px;
}

.text-sm {
  font-size: 13px;
}

.text-xs {
  font-size: 12px;
}

.text-xxs {
  text-indent: -9999px;
}

.text-ellipsis {
  display: block;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.text-u-c {
  text-transform: uppercase;
}

.text-l-t {
  text-decoration: line-through;
}

.text-u-l {
  text-decoration: underline;
}

.text-active,
.active > .text,
.active > .auto .text {
  display: none !important;
}

.active > .text-active,
.active > .auto .text-active {
  display: inline-block !important;
}

.box-shadow {
  box-shadow: 0 2px 2px rgba(0, 0, 0, 0.05), 0 1px 0 rgba(0, 0, 0, 0.05);
}

.box-shadow-lg {
  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.05);
}

.text-shadow {
  font-size: 170px;
  text-shadow: 0 1px 0 #dee5e7, 0 2px 0 #fcfdfd, 0 5px 10px rgba(0, 0, 0, 0.125), 0 10px 20px rgba(0, 0, 0, 0.2);
}

.no-shadow {
  -webkit-box-shadow: none !important;
          box-shadow: none !important;
}

.wrapper-xs {
  padding: 5px;
}

.wrapper-sm {
  padding: 10px;
}

.wrapper {
  padding: 15px;
}

.wrapper-md {
  padding: 20px;
}

.wrapper-lg {
  padding: 30px;
}

.wrapper-xl {
  padding: 50px;
}

.padder-lg {
  padding-right: 30px;
  padding-left: 30px;
}

.padder-md {
  padding-right: 20px;
  padding-left: 20px;
}

.padder {
  padding-right: 15px;
  padding-left: 15px;
}

.padder-v {
  padding-top: 15px;
  padding-bottom: 15px;
}

.no-padder {
  padding: 0 !important;
}

.pull-in {
  margin-right: -15px;
  margin-left: -15px;
}

.pull-out {
  margin: -10px -15px;
}

.b {
  border: 1px solid rgba(0, 0, 0, 0.05);
}

.b-a {
  border: 1px solid #dee5e7;
}

.b-t {
  border-top: 1px solid #dee5e7;
}

.b-r {
  border-right: 1px solid #dee5e7;
}

.b-b {
  border-bottom: 1px solid #dee5e7;
}

.b-l {
  border-left: 1px solid #dee5e7;
}

.b-light {
  border-color: #edf1f2;
}

.b-dark {
  border-color: #3a3f51;
}

.b-black {
  border-color: #3a3f51;
}

.b-primary {
  border-color: #7266ba;
}

.b-success {
  border-color: #27c24c;
}

.b-info {
  border-color: #23b7e5;
}

.b-warning {
  border-color: #fad733;
}

.b-danger {
  border-color: #f05050;
}

.b-white {
  border-color: #ffffff;
}

.b-dashed {
  border-style: dashed !important;
}

.b-l-light {
  border-left-color: #edf1f2;
}

.b-l-dark {
  border-left-color: #3a3f51;
}

.b-l-black {
  border-left-color: #3a3f51;
}

.b-l-primary {
  border-left-color: #7266ba;
}

.b-l-success {
  border-left-color: #27c24c;
}

.b-l-info {
  border-left-color: #23b7e5;
}

.b-l-warning {
  border-left-color: #fad733;
}

.b-l-danger {
  border-left-color: #f05050;
}

.b-l-white {
  border-left-color: #ffffff;
}

.b-l-2x {
  border-left-width: 2px;
}

.b-l-3x {
  border-left-width: 3px;
}

.b-l-4x {
  border-left-width: 4px;
}

.b-l-5x {
  border-left-width: 5px;
}

.b-2x {
  border-width: 2px;
}

.b-3x {
  border-width: 3px;
}

.b-4x {
  border-width: 4px;
}

.b-5x {
  border-width: 5px;
}

.r {
  border-radius: 2px 2px 2px 2px;
}

.r-2x {
  border-radius: 4px;
}

.r-3x {
  border-radius: 6px;
}

.r-l {
  border-radius: 2px 0 0 2px;
}

.r-r {
  border-radius: 0 2px 2px 0;
}

.r-t {
  border-radius: 2px 2px 0 0;
}

.r-b {
  border-radius: 0 0 2px 2px;
}

.m-xxs {
  margin: 2px 4px;
}

.m-xs {
  margin: 5px;
}

.m-sm {
  margin: 10px;
}

.m {
  margin: 15px;
}

.m-md {
  margin: 20px;
}

.m-lg {
  margin: 30px;
}

.m-xl {
  margin: 50px;
}

.m-n {
  margin: 0 !important;
}

.m-l-none {
  margin-left: 0 !important;
}

.m-l-xs {
  margin-left: 5px;
}

.m-l-sm {
  margin-left: 10px;
}

.m-l {
  margin-left: 15px;
}

.m-l-md {
  margin-left: 20px;
}

.m-l-lg {
  margin-left: 30px;
}

.m-l-xl {
  margin-left: 40px;
}

.m-l-xxl {
  margin-left: 50px;
}

.m-l-n-xxs {
  margin-left: -1px;
}

.m-l-n-xs {
  margin-left: -5px;
}

.m-l-n-sm {
  margin-left: -10px;
}

.m-l-n {
  margin-left: -15px;
}

.m-l-n-md {
  margin-left: -20px;
}

.m-l-n-lg {
  margin-left: -30px;
}

.m-l-n-xl {
  margin-left: -40px;
}

.m-l-n-xxl {
  margin-left: -50px;
}

.m-t-none {
  margin-top: 0 !important;
}

.m-t-xxs {
  margin-top: 1px;
}

.m-t-xs {
  margin-top: 5px;
}

.m-t-sm {
  margin-top: 10px;
}

.m-t {
  margin-top: 15px;
}

.m-t-md {
  margin-top: 20px;
}

.m-t-lg {
  margin-top: 30px;
}

.m-t-xl {
  margin-top: 40px;
}

.m-t-xxl {
  margin-top: 50px;
}

.m-t-n-xxs {
  margin-top: -1px;
}

.m-t-n-xs {
  margin-top: -5px;
}

.m-t-n-sm {
  margin-top: -10px;
}

.m-t-n {
  margin-top: -15px;
}

.m-t-n-md {
  margin-top: -20px;
}

.m-t-n-lg {
  margin-top: -30px;
}

.m-t-n-xl {
  margin-top: -40px;
}

.m-t-n-xxl {
  margin-top: -50px;
}

.m-r-none {
  margin-right: 0 !important;
}

.m-r-xxs {
  margin-right: 1px;
}

.m-r-xs {
  margin-right: 5px;
}

.m-r-sm {
  margin-right: 10px;
}

.m-r {
  margin-right: 15px;
}

.m-r-md {
  margin-right: 20px;
}

.m-r-lg {
  margin-right: 30px;
}

.m-r-xl {
  margin-right: 40px;
}

.m-r-xxl {
  margin-right: 50px;
}

.m-r-n-xxs {
  margin-right: -1px;
}

.m-r-n-xs {
  margin-right: -5px;
}

.m-r-n-sm {
  margin-right: -10px;
}

.m-r-n {
  margin-right: -15px;
}

.m-r-n-md {
  margin-right: -20px;
}

.m-r-n-lg {
  margin-right: -30px;
}

.m-r-n-xl {
  margin-right: -40px;
}

.m-r-n-xxl {
  margin-right: -50px;
}

.m-b-none {
  margin-bottom: 0 !important;
}

.m-b-xxs {
  margin-bottom: 1px;
}

.m-b-xs {
  margin-bottom: 5px;
}

.m-b-sm {
  margin-bottom: 10px;
}

.m-b {
  margin-bottom: 15px;
}

.m-b-md {
  margin-bottom: 20px;
}

.m-b-lg {
  margin-bottom: 30px;
}

.m-b-xl {
  margin-bottom: 40px;
}

.m-b-xxl {
  margin-bottom: 50px;
}

.m-b-n-xxs {
  margin-bottom: -1px;
}

.m-b-n-xs {
  margin-bottom: -5px;
}

.m-b-n-sm {
  margin-bottom: -10px;
}

.m-b-n {
  margin-bottom: -15px;
}

.m-b-n-md {
  margin-bottom: -20px;
}

.m-b-n-lg {
  margin-bottom: -30px;
}

.m-b-n-xl {
  margin-bottom: -40px;
}

.m-b-n-xxl {
  margin-bottom: -50px;
}

.avatar {
  position: relative;
  display: block;
  white-space: nowrap;
  border-radius: 500px;
}

.avatar img {
  width: 100%;
  border-radius: 500px;
}

.avatar i {
  position: absolute;
  top: 0;
  left: 0;
  width: 10px;
  height: 10px;
  margin: 2px;
  border-style: solid;
  border-width: 2px;
  border-radius: 100%;
}

.avatar i.right {
  right: 0;
  left: auto;
}

.avatar i.bottom {
  top: auto;
  right: 0;
  bottom: 0;
  left: auto;
}

.avatar i.left {
  top: auto;
  bottom: 0;
}

.avatar i.on {
  background-color: #27c24c;
}

.avatar i.off {
  background-color: #98a6ad;
}

.avatar i.busy {
  background-color: #f05050;
}

.avatar i.away {
  background-color: #fad733;
}

.avatar.thumb-md i {
  width: 12px;
  height: 12px;
  margin: 3px;
}

.avatar.thumb-sm i {
  margin: 1px;
}

.avatar.thumb-xs i {
  margin: 0;
}

.w-1x {
  width: 1em;
}

.w-2x {
  width: 2em;
}

.w-3x {
  width: 3em;
}

.w-xxs {
  width: 60px;
}

.w-xs {
  width: 90px;
}

.w-sm {
  width: 150px;
}

.w {
  width: 200px;
}

.w-md {
  width: 240px;
}

.w-lg {
  width: 280px;
}

.w-xl {
  width: 320px;
}

.w-xxl {
  width: 360px;
}

.w-full {
  width: 100%;
}

.w-auto {
  width: auto;
}

.h-auto {
  height: auto;
}

.h-full {
  height: 100%;
}

.thumb-xl {
  display: inline-block;
  width: 128px;
}

.thumb-lg {
  display: inline-block;
  width: 96px;
}

.thumb-md {
  display: inline-block;
  width: 64px;
}

.thumb {
  display: inline-block;
  width: 50px;
}

.thumb-sm {
  display: inline-block;
  width: 40px;
}

.thumb-xs {
  display: inline-block;
  width: 34px;
}

.thumb-xxs {
  display: inline-block;
  width: 30px;
}

.thumb-wrapper {
  padding: 2px;
  border: 1px solid #dee5e7;
}

.thumb img,
.thumb-xs img,
.thumb-sm img,
.thumb-md img,
.thumb-lg img,
.thumb-btn img {
  height: auto;
  max-width: 100%;
  vertical-align: middle;
}

.img-full {
  width: 100%;
}

.img-full img {
  width: 100%;
}

.scrollable {
  overflow-x: hidden;
  overflow-y: auto;
  -webkit-overflow-scrolling: touch;
}

.scrollable.hover,
.scrollable.hover > .cell-inner {
  overflow-y: hidden !important;
}

.scrollable.hover:hover,
.scrollable.hover:focus,
.scrollable.hover:active {
  overflow: visible;
  overflow-y: auto;
}

.scrollable.hover:hover > .cell-inner,
.scrollable.hover:focus > .cell-inner,
.scrollable.hover:active > .cell-inner {
  overflow-y: auto !important;
}

.smart .scrollable,
.smart .scrollable > .cell-inner {
  overflow-y: auto !important;
}

.scroll-x,
.scroll-y {
  overflow: hidden;
  -webkit-overflow-scrolling: touch;
}

.scroll-y {
  overflow-y: auto;
}

.scroll-x {
  overflow-x: auto;
}

.hover-action {
  display: none;
}

.hover-rotate {
  -webkit-transition: all 0.2s ease-in-out 0.1s;
          transition: all 0.2s ease-in-out 0.1s;
}

.hover-anchor:hover > .hover-action,
.hover-anchor:focus > .hover-action,
.hover-anchor:active > .hover-action {
  display: inherit;
}

.hover-anchor:hover > .hover-rotate,
.hover-anchor:focus > .hover-rotate,
.hover-anchor:active > .hover-rotate {
  -webkit-transform: rotate(90deg);
      -ms-transform: rotate(90deg);
          transform: rotate(90deg);
}

.backdrop {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1050;
}

.backdrop.fade {
  opacity: 0;
  filter: alpha(opacity=0);
}

.backdrop.in {
  opacity: 0.8;
  filter: alpha(opacity=80);
}

/*desktop*/

@media screen and (min-width: 992px) {
  .col-lg-2-4 {
    float: left;
    width: 20.000%;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  .hidden-sm.show {
    display: inherit !important;
  }
  .no-m-sm {
    margin: 0 !important;
  }
}

/*phone*/

@media (max-width: 767px) {
  .w-auto-xs {
    width: auto;
  }
  .shift {
    display: none !important;
  }
  .shift.in {
    display: block !important;
  }
  .row-2 [class*="col"] {
    float: left;
    width: 50%;
  }
  .row-2 .col-0 {
    clear: none;
  }
  .row-2 li:nth-child(odd) {
    margin-left: 0;
    clear: left;
  }
  .text-center-xs {
    text-align: center;
  }
  .text-left-xs {
    text-align: left;
  }
  .text-right-xs {
    text-align: right;
  }
  .no-border-xs {
    border-width: 0;
  }
  .pull-none-xs {
    float: none !important;
  }
  .pull-right-xs {
    float: right !important;
  }
  .pull-left-xs {
    float: left !important;
  }
  .dropdown-menu.pull-none-xs {
    left: 0;
  }
  .hidden-xs.show {
    display: inherit !important;
  }
  .wrapper-lg,
  .wrapper-md {
    padding: 15px;
  }
  .padder-lg,
  .padder-md {
    padding-right: 15px;
    padding-left: 15px;
  }
  .no-m-xs {
    margin: 0 !important;
  }
}

.butterbar {
  position: relative;
  height: 3px;
  margin-bottom: -3px;
}

.butterbar .bar {
  position: absolute;
  width: 100%;
  height: 0;
  text-indent: -9999px;
  background-color: #23b7e5;
}

.butterbar .bar:before {
  position: absolute;
  right: 50%;
  left: 50%;
  height: 3px;
  background-color: inherit;
  content: "";
}

.butterbar.active {
  -webkit-animation: changebar 2.25s infinite 0.75s;
     -moz-animation: changebar 2.25s infinite 0.75s;
          animation: changebar 2.25s infinite 0.75s;
}

.butterbar.active .bar {
  -webkit-animation: changebar 2.25s infinite;
     -moz-animation: changebar 2.25s infinite;
          animation: changebar 2.25s infinite;
}

.butterbar.active .bar:before {
  -webkit-animation: movingbar 0.75s infinite;
     -moz-animation: movingbar 0.75s infinite;
          animation: movingbar 0.75s infinite;
}

/* Moving bar */

@-webkit-keyframes movingbar {
  0% {
    right: 50%;
    left: 50%;
  }
  99.9% {
    right: 0;
    left: 0;
  }
  100% {
    right: 50%;
    left: 50%;
  }
}

@-moz-keyframes movingbar {
  0% {
    right: 50%;
    left: 50%;
  }
  99.9% {
    right: 0;
    left: 0;
  }
  100% {
    right: 50%;
    left: 50%;
  }
}

@keyframes movingbar {
  0% {
    right: 50%;
    left: 50%;
  }
  99.9% {
    right: 0;
    left: 0;
  }
  100% {
    right: 50%;
    left: 50%;
  }
}

/* change bar */

@-webkit-keyframes changebar {
  0% {
    background-color: #23b7e5;
  }
  33.3% {
    background-color: #23b7e5;
  }
  33.33% {
    background-color: #fad733;
  }
  66.6% {
    background-color: #fad733;
  }
  66.66% {
    background-color: #7266ba;
  }
  99.9% {
    background-color: #7266ba;
  }
}

@-moz-keyframes changebar {
  0% {
    background-color: #23b7e5;
  }
  33.3% {
    background-color: #23b7e5;
  }
  33.33% {
    background-color: #fad733;
  }
  66.6% {
    background-color: #fad733;
  }
  66.66% {
    background-color: #7266ba;
  }
  99.9% {
    background-color: #7266ba;
  }
}

@keyframes changebar {
  0% {
    background-color: #23b7e5;
  }
  33.3% {
    background-color: #23b7e5;
  }
  33.33% {
    background-color: #fad733;
  }
  66.6% {
    background-color: #fad733;
  }
  66.66% {
    background-color: #7266ba;
  }
  99.9% {
    background-color: #7266ba;
  }
}
/* / app2-for-pdf.css */
</style>

<style>
/* font2.css */
/*@font-face {
    font-family: "Trade Gothic";
    src: url("../fonts/2D2FC2/2D2FC2_1_0.woff") format('woff');
}

@font-face {
    font-family: "Trade Gothic";
    src: url("../fonts/2D2FC2/2D2FC2_0_0.woff") format('woff');
    font-weight: bold;
}*/
/* / font2.css */
</style>

<style>
/* global.css */
body {
	margin: 0px;
	padding: 0px;
	font-family: TradeGothicNextLTPro-Lt;
}

.header-box {
	background-color: #2C3E50;
}

.header-box .title {
	color: #ffffff;
}

.navbar-xs { min-height:28px; height: 28px; }
.navbar-xs .navbar-brand{ padding: 0px 12px;font-size: 16px;line-height: 28px; }
.navbar-xs .navbar-nav > li > a {  padding-top: 0px; padding-bottom: 0px; line-height: 28px; }

.panel.noborder {
    border: none;
    box-shadow: none;
}
.panel.noborder > .panel-heading {
    border: 0px solid #dddddd;
    border-radius: 0;
}

.bg-blue-1 {
	background-color: #19a9d5 ;
}
.bg-blue-1 .text-lt {
	color: #eaebed;
}
.f-s-18 {
	font-size: 18px;
}

.unblock {
	display: inline;
}

.bg-brand-1 {
	background-color: #00385b ;
}
.text-brand-1 {
	color: #00385b;
}
.bg-ltyellow {
	background-color: #ffffe6;
}
.bg-ltblue {
	background-color: #e6eeff;
}
.bg-ltinfo {
	background-color: #b3f0ff;
}
.bg-ltdanger {
	background-color: #ffc2b3;
}

.table-borderless td, .table-borderless th {
	border: 0px;
}

.cpointer {
	cursor: pointer;
}

.unclickable {
	pointer-events: none;
}

.box-action-1 {
	padding-top: 7px;
}

.p-sm {
	padding: 10px 0 10px 0;
}

.p-r-sm {
	padding-right: 10px;
}

.p-l-sm {
	padding-left: 10px;
}

.p-l-md {
	padding-left: 20px;
}

.p-l-lg {
	padding-left: 30px;
}

.p-l-n {
	padding-left: 0px;
}

.l-s-n {
	list-style: none;
}

.btn-file {
	position: relative;
	overflow: hidden;
}

.btn-file input[type="file"] {
	position: absolute;
	top: 0;
	right: 0;
	min-width: 100%;
	min-height: 100%;
	font-size: 100px;
	text-align: right;
	filter: alpha(opacity=0);
	opacity: 0;
	outline: none;
	background: white;
	cursor: inherit;
	display: block;
}

.nohovereffect:hover {
	text-decoration: none;
	color: #fff;
}
.nohovereffect:focus {
	text-decoration: none;
	color: #fff;
}

.hover-color-primary:hover {
	color: #A1D3F2;
}

.hover-color-primary:focus {
	color: #A1D3F2;
}


.btn-brand1 {
  color: #ffffff !important;
  background-color: #00385b;
  border-color: #00385b;
}

.btn-brand1:hover,
.btn-brand1:focus,
.btn-brand1:active,
.btn-brand1.active,
.open .dropdown-toggle.btn-brand1 {
  color: #ffffff !important;
  background-color: #05436A;
  border-color: #05436A;
}

.btn-brand1:active,
.btn-brand1.active,
.open .dropdown-toggle.btn-brand1 {
  background-image: none;
}

.btn-brand1.disabled,
.btn-brand1[disabled],
fieldset[disabled] .btn-brand1,
.btn-brand1.disabled:hover,
.btn-brand1[disabled]:hover,
fieldset[disabled] .btn-brand1:hover,
.btn-brand1.disabled:focus,
.btn-brand1[disabled]:focus,
fieldset[disabled] .btn-brand1:focus,
.btn-brand1.disabled:active,
.btn-brand1[disabled]:active,
fieldset[disabled] .btn-brand1:active,
.btn-brand1.disabled.active,
.btn-brand1[disabled].active,
fieldset[disabled] .btn-brand1.active {
  background-color: #7266ba;
  border-color: #7266ba;
}

.ctooltip + .tooltip > .tooltip-inner {
	padding: 5px;
	background-color: #1e1e1e;
	font-size: 14px;
	white-space: pre-wrap;
	max-width: none;
}
.ctooltip + .tooltip.top > .tooltip-arrow {
}

.nav-pills-brand1 > li.active > a {
	color: #ffffff;
	background-color: #00385b;
  	border-color: #00385b;
}
.nav-pills-brand1 > li.active > a:hover,
.nav-pills-brand1 > li.active > a:focus,
.nav-pills-brand1 > li.active > a:active {
	color: #ffffff;
  background-color: #05436A;
  border-color: #05436A;
}

.text-brand1 {
	color: #00385b;
}

.b-brand1 {
	border-color: #05436A;
}

.btn-edit-avatar {
	position: absolute;
	bottom: 5px;
	left: 0px;

	opacity: 0.5;
	filter: alpha(opacity=50);
}
.btn-edit-avatar:hover,.btn-edit-avatar:focus {
	position: absolute;
	bottom: 5px;
	left: 0px;
	color: #00385b;

	opacity: 1;
	filter: alpha(opacity=100);
}
.uploadphoto-box {
	width: 320px;
}
.uploadphoto-box input[type="file"] {
	background: none;
	border: none;
}

.table-rowbar {}
.table-rowbar > tbody > tr {
}
.table-rowbar > tbody > tr > td {
	border-top: none;
}
.div-rowbar {	
	background-color: #f4f4f4;
	margin-bottom: 5px;
	padding: 15px 10px;
	border: #d2d2d2 2px solid;
	border-radius: 2px;
}
.div-rowbar > strong {
	padding-right: 10px;
}

.highlight1:hover {
	text-decoration: underline;
	color: #00385b;
}
.table-hover-blue tbody tr:hover td, .table-hover-blue tbody tr:hover th {
  background-color: #E6F5FA;
}

.auto-height {
	box-sizing: border-box;
	overflow: hidden;
}

.defaultHidden {
	display: none;
}
/* / global.css */
</style>

	<style type="text/css" media="print">
	.page-break {
		page-break-after: always;
		page-break-inside: avoid;
		overflow: hidden1;
	}
	div,p {		
		page-break-after: always;
		page-break-inside: avoid;
	}
	</style>
</head>
<body style="background-color:#ffffff">

@yield('content')

@yield('footer')

</body>
</html>