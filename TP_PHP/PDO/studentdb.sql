--
-- PostgreSQL database dump
--

-- Dumped from database version 17.4
-- Dumped by pg_dump version 17.4

-- Started on 2025-04-10 00:46:51

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 218 (class 1259 OID 16395)
-- Name: section; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.section (
    id numeric NOT NULL,
    designation "char",
    description "char"
);


ALTER TABLE public.section OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 16388)
-- Name: student; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.student (
    id numeric NOT NULL,
    birthday date,
    name character varying,
    image bytea,
    section numeric
);


ALTER TABLE public.student OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 16407)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id numeric NOT NULL,
    username character varying,
    email character varying,
    role character varying,
    password character varying
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 4899 (class 0 OID 16395)
-- Dependencies: 218
-- Data for Name: section; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.section (id, designation, description) FROM stdin;
\.


--
-- TOC entry 4898 (class 0 OID 16388)
-- Dependencies: 217
-- Data for Name: student; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.student (id, birthday, name, image, section) FROM stdin;
2	2018-07-11	S	\N	\N
1	1982-02-07	A	\N	\N
\.


--
-- TOC entry 4900 (class 0 OID 16407)
-- Dependencies: 219
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, username, email, role, password) FROM stdin;
1	Mahdi	mehdi@gmail.com	étudiant	mahdi123
\.


--
-- TOC entry 4749 (class 2606 OID 16401)
-- Name: section section_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.section
    ADD CONSTRAINT section_pkey PRIMARY KEY (id);


--
-- TOC entry 4747 (class 2606 OID 16394)
-- Name: student student_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student
    ADD CONSTRAINT student_pkey PRIMARY KEY (id);


--
-- TOC entry 4751 (class 2606 OID 16413)
-- Name: users user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- TOC entry 4752 (class 2606 OID 16402)
-- Name: student section_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student
    ADD CONSTRAINT section_fkey FOREIGN KEY (section) REFERENCES public.section(id) NOT VALID;


-- Completed on 2025-04-10 00:46:51

--
-- PostgreSQL database dump complete
--

