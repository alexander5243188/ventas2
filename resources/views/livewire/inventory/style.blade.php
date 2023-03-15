<style>
                   /** body{                        
                        background: #23EC55;
                        background: -webkit-radial-gradient(top right, #23EC55, #2D51C1);
                        background: -moz-radial-gradient(top right, #23EC55, #2D51C1);
                        background: radial-gradient(to bottom left, #23EC55, #2D51C1);
                        }   */
                             .card{
                                    
                                        margin: 5%;
                                      
                                        
                                        border: none;
                                        border-radius: 0;
                                        color:rgba(0,0,0,1);
                                        letter-spacing: .05rem;
                                        font-family: 'Oswald', sans-serif;
                                        box-shadow: 0 0 21px rgba(0,0,0,.27);
                                } 




                    .button-inventory{
                    background:#023e8a;
                    color:#fff;
                    border:none;
                    position:relative;
                    height:60px;
                    font-size:1.6em;
                    padding:0 2em;
                    cursor:pointer;
                    transition:800ms ease all;
                    outline:none;
                    }
                    .button-inventory:hover{
                    background:#fff;
                    color:#1AAB8A;
                    }
                    .button-inventory:before,button:after{
                    content:'';
                    position:absolute;
                    top:0;
                    right:0;
                    height:2px;
                    width:0;
                    background: #1AAB8A;
                    transition:400ms ease all;
                    }
                    .button-inventory:after{
                    right:inherit;
                    top:inherit;
                    left:0;
                    bottom:0;
                    }
                    .button-inventory:hover:before,button:hover:after{
                    width:100%;
                    transition:800ms ease all;
                    }

</style>
