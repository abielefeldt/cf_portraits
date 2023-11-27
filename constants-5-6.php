<?php

// item dimensions in pixels
// SQ_X: dimensions of central rectangular area
// CAP_H: height of triangular "cap" on top and bottom of item
// GAP: width of gap (padding) between items
// OFFSET_X: offset from top-left corner of viewport
const CAP_H = 128;
const SQ_H = 0;
const SQ_W = 256;
const GAP = 32;
const OFFSET_T = 32;

// background-image resize/"fill" method
// 'cover' or 'contain' or 'auto'
const ITEM_RESIZE = 'cover';

// 'center' or 'top'
const ITEM_POSITION = 'center -18px';

const PEOPLE = [
  ['AriaA', 'YangX', 'TsuwA', 'EvelH', 'FyraF', 'CaesL'],
  ['RexxA', 'MinaC', 'HiroM', 'PettT', 'InneL', 'DyrmT'],
  ['EshmA', 'Gil_A', 'AkiiS', 'Mai_P', 'KeihO', 'TishB'],
  ['HinnL', 'PierT', 'AnaiM', 'ZashZ', 'FaieN', 'GigiB'],
  ['_Enki', '_Enki', '_Enki', '_Enki', '_Enki', '_Enki']
];
