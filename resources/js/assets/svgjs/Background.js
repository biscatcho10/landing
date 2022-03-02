import * as React from "react";

function SvgBackground(props) {
  return (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      xmlnsXlink="http://www.w3.org/1999/xlink"
      viewBox="0 0 1400 1202.97"
      {...props}
    >
      <path
        fillRule="evenodd"
        clipRule="evenodd"
        fill="#eb5d79"
        d="M0-.03h1400v1203H0z"
      />
      <path
        d="M1400-.03v393.9c-18.18-19.69-36.57-43.04-50.04-66.02-20.07-34.24-33.57-72.09-54.88-105.57-18.25-28.7-42.29-50.51-71.82-66.23-18.72-9.96-38.07-17.12-58.62-22.01-21.94-5.2-44.27-8.45-66.41-12.66-38.14-7.28-72.02-16.63-100.27-45.87-13.27-13.74-23.95-29.99-32.04-47.44-1.13-2.43-5.92-15.51-9.84-28.1H1400z"
        fill="#fcc45d"
      />
      <defs>
        <path id="background_svg__a" d="M759.32 0h636.5v565.03h-636.5z" />
      </defs>
      <clipPath id="background_svg__b">
        <use xlinkHref="#background_svg__a" overflow="visible" />
      </clipPath>
      <path
        d="M851.9-39.71c-19.4 46.47.21 105.01 35.45 141.06s83.31 56.38 130.71 73.73c47.4 17.35 96.38 33.07 137.32 62.54 55.74 40.13 91.14 101.58 130.05 158.08 38.92 56.5 87.12 112.52 153.3 131.13"
        clipPath="url(#background_svg__b)"
        fill="none"
        stroke="#fcc45d"
        strokeWidth={1.954}
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeMiterlimit={10}
      />
      <path
        d="M807.62 1202.97H0V737.41c29.82-1.49 96.25 8.73 163.05 106.94 90.83 133.55 46.43 241.67 234.21 172 206.85-76.72 403.67 71.44 410.36 186.62z"
        fill="#fcc45d"
      />
      <path
        d="M599.84 1092.22c0 7.54-6.11 13.66-13.66 13.66-7.54 0-13.66-6.11-13.66-13.66 0-7.54 6.11-13.66 13.66-13.66 7.55.01 13.66 6.12 13.66 13.66z"
        fill="none"
        stroke="#fff"
        strokeMiterlimit={10}
      />
      <circle
        cx={754.31}
        cy={1073.3}
        r={35.77}
        fill="#fff"
        stroke="#fcc145"
        strokeMiterlimit={10}
      />
      <path
        d="M654.45 1005.97v24.83m11.09-12.41h-24.83M45.74 823.94v24.83m11.09-12.41H33.29"
        fill="none"
        stroke="#fff"
        strokeMiterlimit={10}
      />
      <path
        d="M179.17 754.45c0 8.15-6.61 14.75-14.75 14.75-8.15 0-14.75-6.61-14.75-14.75 0-8.15 6.61-14.75 14.75-14.75 8.14-.01 14.75 6.6 14.75 14.75z"
        fill="none"
        stroke="#fcc145"
        strokeMiterlimit={10}
      />
    </svg>
  );
}

export default SvgBackground;
