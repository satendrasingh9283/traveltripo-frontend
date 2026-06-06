import type { Metadata } from "next";
import { Geist, Geist_Mono } from "next/font/google";

import "./globals.css";
import Script from "next/script";


const geistSans = Geist({
  variable: "--font-geist-sans",
  subsets: ["latin"],
});

const geistMono = Geist_Mono({
  variable: "--font-geist-mono",
  subsets: ["latin"],
});

export const metadata: Metadata = {

    "title": "TravelTripo - Best Hotels, Holiday Packages & Adventure Trips",
    "description": "Book affordable hotels, exciting holiday packages, and adventure trips with TravelTripo. Explore top destinations, family vacations, weekend getaways, and travel deals across India and worldwide."

};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
      <meta name="google-adsense-account" content="ca-pub-7653964354183532"/>


      <head>
      <meta name="google-site-verification" content="QN6gtJ6o4YquK6rgCP3NC2vqJT9NQ7bmBZBB_r16ZJE" />
        <Script
          src="https://www.googletagmanager.com/gtag/js?id=G-6XTMVVBGTK"
          strategy="afterInteractive"
        />
        <Script id="google-analytics" strategy="afterInteractive">
          {`
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-6XTMVVBGTK');
          `}
        </Script>

        <meta name="google-adsense-account" content="ca-pub-7653964354183532"/>

      </head>

      <body



        className={`${geistSans.variable} ${geistMono.variable} antialiased`}
      >
        {children}




        <script
        async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7653964354183532"
        crossOrigin="anonymous"
      ></script>

      {/* Ad Unit */}
      <ins
        className="adsbygoogle"
        style={{ display: "block" }}
        data-ad-client="ca-pub-7653964354183532"
        data-ad-slot="1368554037"
        data-ad-format="auto"
        data-full-width-responsive="true"
      ></ins>

      </body>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    </html>
  );
}
